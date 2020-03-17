<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Product,Category};

class ProductController extends Controller
{
    public function getAddProduct(){
        $categorys = Category::all()->toarray();


    	return view('backend.pages.addproduct', compact('categorys'));
    }
    public function getListProduct(){
        $product = Product::paginate(3);


    	return view('backend.pages.listproduct', compact('product'));
    }
    public function getEditProduct(ProductRequest $Request, $id){
        $categorys =Category::all()->toarray(); 
        $product = Product::find($id);
    	return view('backend.pages.editproduct', compact('product','categorys'));
    }

    public function postProduct(ProductRequest $Request){

        $prd = new Product;
        $prd->code = $Request->code;
        $prd->name = $Request->name;
        $prd->slug = Str::slug($Request->name);
        $prd->price = $Request->price;
        $prd->featured = $Request->featured;
        $prd->state = $Request->state;
        $prd->info = $Request->info;
        $prd->describe = $Request->describe;
        if($Request->hasFile('img')){
            $file = $Request->img;
            $file_name = Str::slug($Request->name).'.'.$file->getClientOriginalExtension();
            $file->move('source/backend/img/',$file_name);
            $prd->img = $file_name;
        }
        else{
            $prd->img = 'no-img.jpg';
        }
        $prd->category_id = $Request->category;
        $prd->save();
        return redirect('Admin/Product/listProduct')->with('thongbao', 'Thêm sản phẩm thành công');
    }
    public function postEditProduct(ProductRequest $Request, $id){
        $prd =  Product::find($id);
        $prd->code = $Request->code;
        $prd->name = $Request->name;
        $prd->slug = Str::slug($Request->name);
        $prd->price = $Request->price;
        $prd->featured = $Request->featured;
        $prd->state = $Request->state;
        $prd->info = $Request->info;
        $prd->describe = $Request->describe;
        if($Request->hasFile('img')){
            $file = $Request->img;
            $file_name = Str::slug($Request->name).'.'.$file->getClientOriginalExtension();
            $file->move('source/backend/img/',$file_name);
            $prd->img = $file_name;
        }
        else{
            $prd->img = 'no-img.jpg';
        }
        $prd->category_id = $Request->category;
        $prd->save();
        return redirect('Admin/Product/listProduct')->with('thongbao', 'Sửa sản phẩm thành công');
    }
    public function delProduct($id){
        $product = Product::find($id);
        $product->delete();
       return redirect('Admin/Product/listProduct')->with('thongbao', 'Xóa sản phẩm thành công');
    }
}
