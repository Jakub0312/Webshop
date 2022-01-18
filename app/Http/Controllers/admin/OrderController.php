<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Orderrow;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->get();
        return view ('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->orderdate = $request->orderdate;
        $order->save();

        return redirect()->route('orders.index')->with('message', 'Order succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderrows = Orderrow::all();
        return view ('admin.orders.show', compact('order', 'orderrows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $users = User::all();
        $states = State::all();
        $order->orderdate = Carbon::createFromFormat('Y-m-d H:i:s', $order->orderdate)
            ->format('Y-m-d\TH:i');
        return view('admin.orders.edit', compact('order', 'users', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->user_id = $request->user_id;
        $order->orderdate = $request->orderdate;
        $order->state_id = $request->state_id;
        $order->save();

        return redirect()->route('orders.index')->with('message', 'Order succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function delete(Order $order)
    {
        $users = User::all();
        $states = State::all();
        $order->orderdate = Carbon::createFromFormat('Y-m-d H:i:s', $order->orderdate)
            ->format('Y-m-d\TH:i');
        return view('admin.orders.delete', compact('order', 'users', 'states'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('message', 'Order succesfully deleted');
    }
}
