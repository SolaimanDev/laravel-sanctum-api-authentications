<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$product = array("qty"=>2, "price"=>100, "product_id"=>3);

        for ($i=0; $i <20 ; $i++) { 
        DB::table('orders')->insert([
            'user_id' => $i+1,
            'amount' =>mt_rand(500, 1000),
            'product_details' => json_encode($product),
            'order_date' =>date("Y-m-d"),
            'status'=>1,
        ]);
    }
    }
}
