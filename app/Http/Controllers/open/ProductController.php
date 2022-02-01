<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Models\Addresstype;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderrow;
use App\Models\Product;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

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
        $products = Product::with('latest_price')->get();
        return view('public.products.index', compact('products'));
    }

    // SHOPPING CART FUNCTIONS
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //cart laten zien door dye dumping
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
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

    public function saveOrder(StoreAddressRequest $request)
    {
       //$users = User::find(Auth::user()->id);
        $checkAddress = Address::where('user_id', Auth::user()->id)->first();
        //dd($checkAddress);
        if(empty($checkAddress))
        {
            $address = new Address();
            $address->user_id = Auth::user()->id;
            $address->address = $request->streetname;
            $address->city = $request->city;
            $address->zipcode = $request->zipcode;
            $address->country = $request->country;
            $address->addresstype_id = $request->input('addresstype');
            $address->save();
        }
        $cart = Session::get('cart');
        //dd($cart);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->orderdate = Carbon::now();
        $order->save();

        foreach ($cart->items as $value) {
            $orderrow = new Orderrow();
            $orderrow->order_id = $order->id;
            $orderrow->product_id = $value['item']->id;
            $orderrow->amount = $value['amount'];
            $orderrow->save();
        }

        Session::forget('cart');

        return redirect()->route('product.index')->with('message', 'Order succesfully placed!');

    }

}
