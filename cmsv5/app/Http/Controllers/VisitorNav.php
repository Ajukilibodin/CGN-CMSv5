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

        $this->validate($request, $rules);

        $username = $request->input('login-form-username');
        $password = $request->input('login-form-password');
        $remember = $request->input('remember-me');

        $getUser = Customer::where('Email', $username);

        if( $getUser->count() > 0 && \Hash::check($password ,$getUser->first()->Password) ){
          $getUser = $getUser->first();
          $cookietime = 60*24; //60 min * 24 hour = 1 day
          if($remember) $cookietime *= 30; //30 day
          \Cookie::queue(\Cookie::make('customerlogin', $getUser->id, $cookietime));
          \Cookie::queue(\Cookie::make('customername', $getUser->Name, $cookietime));
          $getUser->LastLogin = \Carbon\Carbon::now();
          $getUser->save();
          return back()->with('welcomemessage', 'Hoşgeldin '.$getUser->Name );
        }
        else{
          return back()->with('error', 'Yanlış Kullanıcı Bilgileri');
        }
      }
    }

    public function f_register(Request $request){
      if(\Cookie::get('customerlogin'))
        return redirect("/");
      else{
        $rules = [
          'register-form-name' => 'required|max:255',
          'register-form-lname' => 'required|max:255',
          'register-form-email' => 'required|email',
          'register-form-password' => 'required|max:100',
          'register-form-repassword' => 'required|max:100',
          'read-contract' => 'required'
        ];

        $this->validate($request, $rules);

        $name = $request->input('register-form-name');
        $lname = $request->input('register-form-lname');
        $email = $request->input('register-form-email');
        $phone = $request->input('register-form-phone');
        $password = $request->input('register-form-password');
        $repassword = $request->input('register-form-repassword');
        if($request->input('read-contract')) $readcontract = true;
        else $readcontract = false;
        if($request->input('want-mail-subscribe')) $mailsub = true;
        else $mailsub = false;

        if(!$readcontract)
          return back()->with('error', 'Üyelik sözleşmesini kabul etmeden üye olamazsınız.');

        if($password != $repassword)
          return back()->with('error', 'Şifreler birbirine uyuşmuyor.');

        $newcustomer = new \App\Customer;
        $newcustomer->Name = $name;
        $newcustomer->Surname = $lname;
        $newcustomer->Email = $email;
        $newcustomer->Phone = $phone;
        $newcustomer->Password = \Hash::make($password);
        $newcustomer->MailSub = $mailsub;
        $newcustomer->save();

        // TODO: Burada üye olma maili gönderecek, mail onaylanırsa üye sistemde olacak

        return redirect('/')->with('welcomemessage', 'Hoşgeldin '.$name );
      }
    }

    public function profile(Request $request){
      if( !\Cookie::get('customerlogin') )
        return redirect('/');
      else{
        return view('pages/profile');
      }
    }

    public function profile_update(Request $request){
      if( !\Cookie::get('customerlogin') )
        return redirect('/');
      else{
        $rules = [
          'userinfo-form-name' => 'required|max:255',
          'userinfo-form-lname' => 'required|max:255',
          'userinfo-form-email' => 'required|email'
        ];

        $this->validate($request, $rules);

        $name = $request->input('userinfo-form-name');
        $lname = $request->input('userinfo-form-lname');
        $email = $request->input('userinfo-form-email');
        $phone = $request->input('userinfo-form-phone');
        if($request->input('mail-subscribe')) $mailsub = true;
        else $mailsub = false;

        $getUser = Customer::where('id', \Cookie::get('customerlogin'));

        if($getUser->count() > 0)
        {
          $getUser = $getUser->first();
          $getUser->Name = $name;
          $getUser->Surname = $lname;
          $getUser->Email = $email;
          $getUser->Phone = $phone;
          $getUser->MailSub = $mailsub;
          $getUser->save();
          return back()->with('success', 'Üyelik bilgileriniz güncellenmiştir.');
        }
        else{
          return back()->with('error', 'Giriş yapan kullanıcı sistemde bulunamadı!');
        }
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
