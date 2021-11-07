<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    public function index()
    {
 		return Order::all();
    }
     public function store(Request $request)
    {
    	// echo "I GOT it";
    	// echo '<pre>';
    	// print_r($request['amont']);
    	// exit;
        $fields = $request->validate([
            'product_id' => 'required',
            'price' => 'required',            
        ]);
        $data=array();
        $product_data=array();
        $amount=0;
         if(count($request['product_id']) > 0){
            for ($request['product_id']=0; $i < count($request['product_id']) ; $i++) { 
                // Checking Duplicate ID For count Quantity 
                if($request['product_id'][$i]==$request['product_id'][$i+1]){
                    $data['product_id']=$request['product_id'][$i];            
                    $data['qty']=$request['qty'][$i] + $request['qty'][$i];
                    $data['price']=$request['price'][$i] + $request['price'][$i];
                }else{
                    if(!empty($data)){   // Check Data is not empty
                        array_push($product_data, $data)
                    }
                    $data['product_id']=$request['product_id'][$i];
                    $data['qty']=$request['qty'][$i];
                    $data['price']=$request['price'];
                }
                $amount +=$data['price'];    
                array_push($product_data, $data)           
            }          

          
         }

        $orders = Order::create([
            'amount' => $amount,
            'user_id' => auth()->user()->id,
            'product_details' =>json_encode($product_data),
            'order_date' => date("Y-m-d"),
            'status' => 1,
        ]);
        if ($orders) {
          return response("Success", 201);
        }else{
           return response("Error", 401);
        }

    }
}
