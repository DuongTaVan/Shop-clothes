<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function getCategory(){
    	$category = Category::all()->toarray();
    	//dd($category);
    	return view('backend.pages.category', compact('category'));
    }
    public function getEditCategory($id){
    	$cate = Category::find($id);
    	$cates = Category::all()->toarray();
    	return view('backend.pages.editcategory', compact('cate','cates'));
    }
    public function postCategory(Request $Request){
    	$cate = new Category;
    	$cate->name = $Request->name;
    	$cate->slug = Str::slug($Request->name);
    	$cate->parent= $Request->parent;
    	$cate->save();
    	return redirect()->back()->with('thongbao','Thêm danh mục thành công!');
    }
    public function postEditCategory(Request $Request, $id){
    	//dd('a');
    	$cate =  Category::find($id);
    	$cate->name = $Request->name;
    	$cate->slug = Str::slug($Request->name);
    	$cate->parent= $Request->parent;
    	$cate->save();
    	return redirect()->back()->with('thongbao','Sửa danh mục thành công!');
    }
    public function delCategory($id){
    	$cate = Category::find($id);
    	Category::where('parent',$id)->update(['parent'=>$cate->parent]);
    	$cate->delete();
    	return redirect('Admin/Category')->with('thongbao','Bạn đã xóa thành công!');
    }
}
