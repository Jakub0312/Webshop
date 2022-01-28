<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreOrderrowRequest;
use App\Http\Requests\UpdateOrderrowRequest;
use App\Models\Order;
use App\Models\Orderrow;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderrows = Orderrow::with('order', 'product')->get();
        return view ('admin.orderrows.index', compact('orderrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('admin.orderrows.create', compact('orders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderrowRequest $request)
    {
        $orderrow = new Orderrow();
        $orderrow->order_id = $request->order_id;
        $orderrow->product_id = $request->product_id;
        $orderrow->amount = $request->amount;
        $orderrow->save();

        return redirect()->route('orderrows.index')->with('message', 'Orderrow succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderrow  $orderrow
     * @return \Illuminate\Http\Response
     */
    public function show(Orderrow $orderrow)
    {
        //$orderrows = Orderrow::with('order', 'product')->get();
        return view ('admin.orderrows.show', compact('orderrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderrow  $orderrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderrow $orderrow)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('admin.orderrows.edit', compact('orderrow', 'orders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderrow  $orderrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderrowRequest $request, Orderrow $orderrow)
    {
        $orderrow->order_id = $request->order_id;
        $orderrow->product_id = $request->product_id;
        $orderrow->amount = $request->amount;
        $orderrow->save();

        return redirect()->route('orderrows.index')->with('message', 'Orderrow succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderrow  $orderrow
     * @return \Illuminate\Http\Response
     */
    public function delete(Orderrow $orderrow)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('admin.orderrows.delete', compact('orderrow', 'orders', 'products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderrow  $orderrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderrow $orderrow)
    {
        $orderrow->delete();
        return redirect()->route('orderrows.index')->with('message', 'Orderrow succesfully deleted');
    }
}
