<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Mail;
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
          $this->sendMailToCustomer($order->customer->email);
       	  return redirect()->back()
                        ->with('success','Mail sent successfully.');
       }else{
       	return redirect()->back()
                        ->with('error','Something went wrong.');
       }


    }

    public function sendMailToCustomer($email_address)
    {  
      $data = array('name'=>"Solaiman Ahmed");
      Mail::send('email.customer', $data, function($message) {
        // Set Valid Email 
         $message->to('rerala3333@niekie.com')->subject('Order Informations'); 
         $message->from('Emily0000021@gmail.com','Solaiman Ahmed');
      });



    }
}
