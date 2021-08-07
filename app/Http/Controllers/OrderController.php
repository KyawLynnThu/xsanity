<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orders = DB::table('orders')
                ->where('id', '=',$order->id) ;
       
        $orderitems = Order::join('item_order', 'item_order.order_id', '=', 'orders.id')
              ->join('items', 'item_order.item_id', '=', 'items.id')
              ->join('users', 'orders.user_id', '=', 'users.id')
              ->where('item_order.order_id', '=', $order->id)
              ->get(['orders.*','item_order.*','items.name as tname','items.price as tprice','items.codeno as code','users.*']);

        return view('backend.order.edit',compact('orders','orderitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            "status" => "required|max:191|min:1",
        ]);
        
        // data update
        $order->status = $request->status;
        $order->save();

        // redirect
        return redirect()->route('order.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        
        return redirect()->route('order.index');
    }
}
