<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\agency;
class AdminController extends Controller
{

    function home(){
        $count=agency::count();
        return view('admin/home',compact('count'));
    }
	
	 protected function guard()
    {
        return Auth::guard('admin');
    }
	

    function get_login_view(){
        
    	return view('Admin.login_form');
    }

    function login(){
        
    	$remember=Request()->has('remember')?true:false;//define session time for user login
    	if(auth()->guard('admin')->attempt(['email'=>Request('email'),'password'=>Request('password')],$remember)){

    		return redirect(url('admin/home'));
    	}
    	else{
           
    		return back()->with('message','Invalid Email or Password');
    	}
    }

    function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

}
