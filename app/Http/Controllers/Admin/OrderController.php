<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Order,ProductOrder};
class OrderController extends Controller
{
    public function getDetailOrder($id){

    	$order = Order::find($id);
    	//dd($order);
		$prd_order = ProductOrder::where('order_id',$id)->get();
		
    	return view('backend.pages.detailorder',compact('order','prd_order'));
    }
    public function getProcessed($id){
    	$state = Order::find($id);
        //sdd($state);
        $state->state = 2;
        $state->save();
        //dd($state);
        return redirect('Admin/Order/process');
    	
    }
    public function getProcess(){
    	$state = Order::where('state',2)->get();
    	//dd($state);
    	return view('backend.pages.processed',compact('state'));
    }

	public function getOrder(){
		$order = Order::where('state',1)->get();
    	return view('backend.pages.order', compact('order'));
    }

}
