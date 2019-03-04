<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class VisitorNav extends Controller
{
    public function index(){
      return view('pages/index');
    }

    public function login(){
      if(\Cookie::get('customerlogin'))
        return redirect('/');//redirect()->route('index');
      else{
        return view('pages/login-register');
      }
    }

    public function logout(){
      \Cookie::queue(\Cookie::forget('customerlogin'));
      return redirect('/');
    }

    public function f_login(Request $request){
      if(\Cookie::get('customerlogin'))
        return redirect()->route('index')->with('welcomemessage', 'Hoşgeldin '.(\Cookie::get('customername')) );
      else{
        $rules = [
          'login-form-username' => 'required',
          'login-form-password' => 'required'
        ];

        $customMessages = [
          'required' => 'Zorunlu alanı doldurunuz.'
        ];

        $this->validate($request, $rules, $customMessages);

        $username = $request->input('login-form-username');
        $password = $request->input('login-form-password');
        $remember = $request->input('remember-me');

        $getUser = Customer::where('Email', $username);

        if( $getUser->count() > 0 && \Hash::check($password ,$getUser->first()->Password) ){
          $cookietime = 60*24; //60 min * 24 hour = 1 day
          if($remember) $cookietime *= 30; //30 day
          \Cookie::queue(\Cookie::make('customerlogin', $getUser->first()->id, $cookietime));
          \Cookie::queue(\Cookie::make('customername', $getUser->first()->Name, $cookietime));
          $getUser->first()->LastLogin = \Carbon\Carbon::now();
          $getUser->first()->save();
          return back()->with('welcomemessage', 'Hoşgeldin '.$getUser->first()->Name );
        }
        else{
          return back()->with('error', 'Yanlış Kullanıcı Bilgileri');
        }
      }
    }

    public function f_register(Request $request){
      return view('pages/login-register');
    }

    public function profile(){
      if( !\Cookie::get('customerlogin') )
        return redirect('/');
      else{
        return view('pages/profile');
      }
    }

    public function cart(){
      return view('pages/cart');
    }

    public function checkout(){
      return view('pages/checkout');
    }

    public function category(){
      return view('pages/category');
    }

    public function page(){
      return view('pages/page');
    }

    public function products(){
      return view('pages/products');
    }

    public function product(){
      return view('pages/product');
    }

    public function orderdetail(){
      return view('pages/order-detail');
    }
}
