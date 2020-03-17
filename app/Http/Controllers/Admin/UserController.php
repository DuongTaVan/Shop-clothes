<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
class UserController extends Controller
{
    public function getAddUser(){
    	return view('backend.pages.adduser');
    }
    public function getListUser(){
    	$users = Users::paginate(5);
    	return view('backend.pages.listuser', compact('users'));
    }
    public function getEditUser($id){
    	$users = Users::find($id);
    	return view('backend.pages.edituser',compact('users'));
    }
    public function postAddUser(Request $Request){
    	$users = new Users;
    	$users->email = $Request->email;
    	$users->full = $Request->full;
    	$users->password = bcrypt($Request->email);
    	$users->level = $Request->level;
    	$users->address = $Request->address;
    	$users->phone = $Request->phone;
    	$users ->save();
    	return redirect('Admin/User/listUser')->with('thongbao','Thêm thành công user');
    }
    public function postEditUser(Request $Request, $id){
    	$users = Users::find($id);
    	$users->email = $Request->email;
    	$users->full = $Request->full;
    	$users->password = bcrypt($Request->password);
    	$users->level = $Request->level;
    	$users->address = $Request->address;
    	$users->phone = $Request->phone;
    	$users ->save();
    	return redirect('Admin/User/listUser')->with('thongbao','Sửa thành công user');
    }
    public function getdelUser($id){
    	$users = Users::find($id);
    	$users->delete();
    	return redirect('Admin/User/listUser')->with('thongbao','Xóa thành công user');
    }
}
