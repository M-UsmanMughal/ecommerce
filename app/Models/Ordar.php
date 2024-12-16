<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordar extends Model
{
    protected $table ='ordars'; 
    protected $fillable = [ 'name' , 'phone' , 'address' , 'payment_method' , 'product_name' , 'quantity' , 'price' , 'total_price' ];
}
