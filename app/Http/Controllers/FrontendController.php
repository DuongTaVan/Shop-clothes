<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\checkoutRequest;
use App\Http\Requests\ContactRequest;
use App\{Product, Category,Order,ProductOrder,Contact};
use Cart;
class FrontendController extends Controller
{
    public function getIndex(){
   		$spnb = Product::where('featured',1)->take(4)->get();
   		$spm = Product::orderBy('id','desc')->take(8)->get();
    	return view('frontend.pages.index',compact('spnb','spm'));
    }
    public function getShop(){
    	$Product = Product::paginate(9);
    	$Cate = Category::all();
    	return view('frontend.pages.shop',compact('Product','Cate'));
    }
    public function getPrdCate($slug_Cate){
    	//dd($slug_Cate);
    	$Product = Category::where('slug',$slug_Cate)->first()->h()->paginate(6);
    	$Cate = Category::all();
    	return view('frontend.pages.shop',compact('Product','Cate'));
    }
    public function getFilter(Request $Request){
    	$Product = Product::whereBetween('price', [$Request->start, $Request->end])->paginate(6);
    	$Cate = Category::all();
    	return view('frontend.pages.shop',compact('Product','Cate'));
    }
    public function getdetail($slug_Prd){
    	$detail = Product::where('slug',$slug_Prd)->first();
    	$spm = Product::orderBy('id','desc')->paginate(4);
    	return view('frontend.pages.detail', compact('detail','spm'));
    }




    //CART
    public function postAddCart(Request $Request, $id){
    	$cart = Product::find($id);
       Cart::add(['id' => $cart->id, 'name' => $cart->name, 'qty' => $Request->quantity, 'price' => $cart->price, 'weight' => 550, 'options' => ['img' => $cart->img,'code'=>$cart->code]]);
    	return redirect('Frontend/Product/show');
    }
    public function getShowCart(){
        $total = Cart::total();
        $data = Cart::content();
        //dd($data);
        return view('frontend/pages/cart', compact('data','total'));

    }
    public function getDelCart($rowId){
        Cart::remove($rowId);
        return redirect('Frontend/Product/show'); 
    }
    public function getUpdate($rowId,$qty){
        //echo 'da vào day';
        //dd($qty);
        Cart::update($rowId, $qty);
       return "success";

       // return redirect('clear/show');
    }
    public function getAbout(){
        return view('frontend.pages.about');
    }
    public function getContact(){
        return view('frontend.pages.contact');
    }
    public function getCheckout(){
        $total = Cart::total();
        $data = Cart::content();
        return view('frontend.pages.checkout', compact('data','total'));
    }
    public function getAddProductUser(checkoutRequest $Request){
        //dd(Cart::content());
        $user = new Order;
        
        $user->full = $Request->name;
        $user->phone = $Request->phone;
        $user->address = $Request->address;
        $user->email = $Request->email;
        $user->state = 1;
        $user->total = Cart::total(0,"","");
        $user->save();
        $test = Order::find($user->id);

        
        foreach(Cart::content() as $cart)
        {
            //dd($cart);
            $pr =new ProductOrder;
            $pr->name = $cart->name;
            $pr->code = $cart->options->code;
            $pr->price = $cart->price;
            $pr->img = $cart->options->img;
            $pr->order_id = $user->id;
            $pr->save();

        }
        $testt = ProductOrder::where('order_id',$user->id)->get();
        //dd($test);
        Cart::destroy();
       
        return view('frontend.pages.complete',compact('test','testt'));

    }

    public function postContact(ContactRequest $Request){
        $contact = new Contact;
        $contact->full = $Request->full;
        $contact->email = $Request->email;
        $contact->theme = $Request->theme;
        $contact->message = $Request->message;
        $contact->save();
        return redirect('Frontend/Product/contact')->with('thongbao','Thông tin của bạn sẽ sớm được phản hồi! Thanks');
    }
    
   }
