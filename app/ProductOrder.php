<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_order';

    public function order(){
    	return $this->belongsTo('App\Order','order_id','id');
    }
    
}
