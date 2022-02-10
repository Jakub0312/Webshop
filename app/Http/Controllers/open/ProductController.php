<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Models\Addresstype;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderrow;
use App\Models\Product;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::all();
        $products = Product::with('latest_price', 'category')->paginate(12);
        return view('public.products.index', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('public.products.detail', compact('product'));
    }

    public function getCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get(); //pakt alle producten met id die in de url staat
        return view('public.products.index', compact('products'));
    }

    // SHOPPING CART FUNCTIONS
    public function getAddToCart(Request $request, $id) //toevoegen van een item aan winkelmandje
    {
        $product = Product::find($id); //zoekt het product op
        $oldCart = Session::has('cart') ? Session::get('cart') : null; //checkt of de session "Cart" al bestaat, zo niet wordt die aangemaakt
        $cart = new Cart($oldCart); //Nieuw model aangemaakt met de informatie die al in de oude cart zat
        $cart->add($product, $product->id); //product wordt toegevoegd aan de cart

        $request->session()->put('cart', $cart); //Via request wordt de Session cart geupdate met de net nieuw aangemaakte cart
        return redirect()->back(); //route('public.product.index');
    }

    public function getRemoveItem(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null; //checkt of de session "Cart" al bestaat, zo niet wordt die aangemaakt
        $cart = new Cart($oldCart);
        $cart->remove($id);

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart()
    {
        if (!Session::has('cart') || Session::get('cart')->totalAmount === '0') { //als de session cart nog niet bestaat wordt die zonder variabelen geroute
            return view('public.carts.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('public.carts.shopping-cart', ['products' => $cart->items,
            'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        //if the session has no cart you get returned to the shopping cart page
        if (!Session::has('cart')) {
            return view('public.carts.shopping-cart');
        }

        $cart = Session::get('cart');
        $addresstypes = Addresstype::all();

        if(Auth::user()) { //if the user is logged in all your information will be filled in
            $users = User::find(Auth::user()->id);
            $address = Address::where('user_id', $users->id)->first(); //get the address of the user
            return view('public.carts.checkout', ['products' => $cart->items,
                'totalPrice' => $cart->totalPrice], compact('address', 'addresstypes'));
        }
        else { //if user is not logged in blank form will be shown
            return view('public.carts.checkout', ['products' => $cart->items,
                'totalPrice' => $cart->totalPrice], compact('addresstypes'));

        }

    }

    public function saveOrder(Request $request)
    {
        if (Auth::check()) { //als er een gebruiker is ingelogd kan de gebruiker worden opgezocht
            $user = User::find(Auth::user()->id);
            $checkAddress = Address::where('user_id', $user->id)->first();

            if(empty($checkAddress))
            {
                $validated = $request->validate([
                    'streetname' => 'string|min:5|max:100',
                    'zipcode' => 'string|min:5|max:15',
                    'city' => 'string|min:5|max:100',
                    'country' => 'string|min:5|max:45',
                    'addresstype' => 'integer',
                ]);
                $address = new Address();
                $address->user_id = $user->id;
                $address->address = $request->streetname;
                $address->city = $request->city;
                $address->zipcode = $request->zipcode;
                $address->country = $request->country;
                $address->addresstype_id = $request->input('addresstype');
                $address->save();
            }
        } else {

            $validated = $request->validate([
                'name' => 'required|string|min:3|max:45',
                'email' => 'required|string|min:5|max:100|unique:users',
                'streetname' => 'string|min:5|max:100',
                'zipcode' => 'string|min:5|max:15',
                'city' => 'string|min:5|max:100',
                'country' => 'string|min:5|max:45',
                'addresstype' => 'integer',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->get('myCheck')) {
                $validated = $request->validate([
                    'password' => 'required|min:8|string'
                ]);
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $address = new Address();
            $address->user_id = $user->id;
            $address->address = $request->streetname;
            $address->city = $request->city;
            $address->zipcode = $request->zipcode;
            $address->country = $request->country;
            $address->addresstype_id = $request->input('addresstype');
            $address->save();
        }

        //dd($checkAddress);

        $cart = Session::get('cart');
        //dd($cart);

        $order = new Order();
        $order->user_id = $user->id;
        $order->orderdate = Carbon::now();
        $order->state_id = '1';
        $order->save();

        foreach ($cart->items as $value) {
            $orderrow = new Orderrow();
            $orderrow->order_id = $order->id;
            $orderrow->product_id = $value['item']->id;
            $orderrow->amount = $value['amount'];
            $orderrow->save();
        }

        Session::forget('cart');

        return redirect()->route('home')->with('message', 'Your order has been placed!');

    }
}
