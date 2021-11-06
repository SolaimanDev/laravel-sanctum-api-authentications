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
    	echo '<pre>';
    	print_r($request['amont']);
    	exit;
    }
}
