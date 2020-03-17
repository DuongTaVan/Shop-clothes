<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public function Prd_order(){
    	return $this->hasMany('App\ProductOrder','order_id','id');
    }
    
}
