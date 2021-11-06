<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	$orders=Order::latest()->paginate(15);


    	return view('order.index',compact('orders'));
    }
    public function edit($id)
    {
    	$order=Order::find($id);
       return $order;
    }
    public function changeStatus($type,$order_id)
    {
       $order=Order::with('customer')->find($order_id);
       $data = array('status' => $type);
       if($order->update($data))
       {
       	return "Success";
       }else{
       	return "Failed";
       }


    }
}
