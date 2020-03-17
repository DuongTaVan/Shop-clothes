<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\EditInformationUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Users;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
    	return view('backend.Login');
    }
    public function postLogin(LoginRequest $Request){
    	//dd($Request);
    	$data = ['email'=>$Request->email,'password'=>$Request->password];
    	if($Request->remember = 'Remember Me'){
    		$remember = true;
    	}
    	else
    		$remember = false;
    	if(Auth::attempt($data,$remember)){
    		return redirect('Admin');
    	}
    	else
    		return redirect('Login')->with('thongbao','Tài khoản hoặc mật khẩu không đúng!');
    }
    public function getLogout(){
        Auth::logout();
        return redirect('Login');
    }
    public function getinformation(){
        return view('backend.pages.information');
    }
    public function getEditAdmin(){
        return view ('backend.pages.editAdmin');
    }
    public function getEdit(EditInformationUser $Request, $id){
        $user = Users::find($id);
        $user->full = $Request->full;
        $user->password = bcrypt($Request->password);
        $user->address = $Request->address;
        $user->phone = $Request->phone;
        $user->save();
        return redirect('Admin/information');

    }
}
