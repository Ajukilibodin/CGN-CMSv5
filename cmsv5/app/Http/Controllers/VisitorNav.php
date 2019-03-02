<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorNav extends Controller
{
    public function index(){
      return view('pages/index');
    }

    public function login(){
      return view('pages/login-register');
    }

    public function cart(){
      return view('pages/cart');
    }

    public function f_login(Request $request){
      return view('pages/login-register');
    }

    public function f_register(Request $request){
      return view('pages/login-register');
    }
}
