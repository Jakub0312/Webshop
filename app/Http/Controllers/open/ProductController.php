<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Models\Address;
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
        if (!Session::has('cart')) {
            return view('public.carts.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        if(Auth::user()) {
            $users = User::find(Auth::user()->id);
            $address = Address::where('user_id', $users->id)->first();
            return view('public.carts.checkout', ['products' => $cart->items,
                'totalPrice' => $cart->totalPrice], compact('address'));

        }
        else {
            return view('public.carts.checkout', ['products' => $cart->items,
                'totalPrice' => $cart->totalPrice]);

        }

    }

    public function saveOrder()
    {
        $users = User::find(Auth::user()->id);
        $oldCart = Session::get('cart');
        //$cart = serialize($oldCart);
        dd($oldCart);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->orderdate = Carbon::now();
        $order->save();

        foreach ($oldCart as $value) {
            $orderrow = new Orderrow();
            $orderrow->order_id = $order->order_id;
            $orderrow->product_id = $value['item']['id'];
            $orderrow->amount = $value['amount'];
            $orderrow->save();
        }

        return redirect()->route('product.index')->with('message', 'Order succesfully placed!');

    }

}
