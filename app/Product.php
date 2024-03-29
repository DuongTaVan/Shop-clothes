<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public function cate(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
