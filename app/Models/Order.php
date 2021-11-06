<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'product_details',
        'order_date',
        'status'
    ];
    public function customer()
    {        
        return $this->belongsTo('App\Models\User','user_id');
    }
}
// 
// {"product_id":1,"qty":5,"price":100}