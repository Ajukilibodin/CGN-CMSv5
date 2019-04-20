<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Customer;
use App\Verify;

class VisitorNav extends Controller
{
    public function index(){
      //\Cookie::queue(\Cookie::make('customercart', json_encode(array()), 60*24*30));

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
      \Cookie::queue(\Cookie::forget('customername'));
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
          $_ttemp = Verify::where('UserID',$getUser->first()->id);
          if($_ttemp->count() > 0 )
          {
            if($_ttemp->first()->Type == 'NewRegister'){
              return redirect('/login')->with('error', 'Kullanıcı hesabınızı mailinizden onaylayınız!');
            }
            else {
              $_ttemp->first()->delete();
            }
          }
          $getUser = $getUser->first();
          $cookietime = 60*24; //60 min * 24 hour = 1 day
          if($remember) $cookietime *= 30; //30 day
          \Cookie::queue(\Cookie::make('customerlogin', $getUser->id, $cookietime));
          \Cookie::queue(\Cookie::make('customername', $getUser->Name, $cookietime));
          $getUser->LastLogin = \Carbon\Carbon::now();
          if($getUser->TempCart){
            \Cookie::queue(\Cookie::make('customercart', $getUser->TempCart, 60*24*30));
          }
          else{
            $getUser->TempCart = \Cookie::get('customercart');
          }
          $getUser->save();
          return back()->with('welcomemessage', 'Hoşgeldin '.$getUser->Name );
        }
        else{
          return back()->with('error', 'Yanlış Kullanıcı Bilgileri');
          // TODO: şifrenizi mi unuttunuz???
        }
      }
    }

    public function loginkey($key)
    {
      $getUser = Verify::where('Token',$key);
      if($getUser->count() > 0)
      {
        $getUser = $getUser->first();
        $t_user = Customer::where('id', $getUser->UserID)->first();
        $cookietime = 60*24; //60 min * 24 hour = 1 day
        \Cookie::queue(\Cookie::make('customerlogin', $t_user->id, $cookietime));
        \Cookie::queue(\Cookie::make('customername', $t_user->Name, $cookietime));
        $t_user->LastLogin = \Carbon\Carbon::now();
        $t_user->save();
        $getUser->delete();
        return redirect('/')->with('welcomemessage', 'Hesabın aktifleştirildi. Hoşgeldin '.$t_user->Name );
      }
      else {
        redirect('/');
        // TODO: bir ip'den birden fazla deneme olur ise o ip'yi blocklamalı
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

        if(Customer::where('Name','<>','Non-Customer')->where('Email',$email)->count() > 0)
          return back()->with('error', 'Bu mail ile başka bir kullanıcı mevcuttur. Şifrenizi mi unuttunuz?');

        $newcustomer = new \App\Customer;
        $newcustomer->Name = $name;
        $newcustomer->Surname = $lname;
        $newcustomer->Email = $email;
        $newcustomer->Phone = $phone;
        $newcustomer->Password = \Hash::make($password);
        $newcustomer->MailSub = $mailsub;
        $newcustomer->save();

        $temp_token = Str::random(90);
        Verify::create(['UserID' => $newcustomer->id, 'Token' => $temp_token]);
        return redirect('/')->with('reg_token', $temp_token)->with('reg_mail',$email)
        ->with('welcomemessage', 'Sayın '.$name." ".$lname.", üyelik işleminiz mailinize ulaştırılan linki takip etmeniz ile tamamlanacaktır." );
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

    public function updateaddress(Request $request){
      if( !\Cookie::get('customerlogin') )
        return redirect('/');
      else{
        $rules = [
          'billing-form-address' => 'required|max:1000',
          'billing-form-address2' => 'required|max:1000',
          'billing-form-city' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $addr1 = $request->input('billing-form-address');
        $addr2 = $request->input('billing-form-address2');
        $city = $request->input('billing-form-city');

        $getUser = Customer::where('id', \Cookie::get('customerlogin'));

        if($getUser->count() > 0)
        {
          $getUser = $getUser->first();
          $getUser->Address = $addr1.'<br>'.$addr2;
          $getUser->State = $city;
          $getUser->save();
          return back()->with('success', 'Üyelik bilgileriniz güncellenmiştir.');
        }
        else{
          return back()->with('error', 'Giriş yapan kullanıcı sistemde bulunamadı!');
        }
      }
    }

    public function changepassword(Request $request){
      if( !\Cookie::get('customerlogin') )
        return redirect('/');
      else{
        $rules = [
          'password-form-oldpass' => 'required|max:100',
          'password-form-newpass1' => 'required|max:100',
          'password-form-newpass2' => 'required|max:100'
        ];

        $this->validate($request, $rules);

        $oldpass = $request->input('password-form-oldpass');
        $pass1 = $request->input('password-form-newpass1');
        $pass2 = $request->input('password-form-newpass2');

        if($pass1 != $pass2)
          return back()->with('error', 'Girdiğiniz iki şifre birbirine uyuşmuyor!');

        $getUser = Customer::find(\Cookie::get('customerlogin'));

        if( \Hash::check($oldpass , $getUser->Password) )
        {
          $getUser->Password = \Hash::make($pass1);
          $getUser->save();

          return back()->with('success', 'Üyelik şifreniz güncellenmiştir.');
        }
        else{
          return back()->with('error', 'Girdiğiniz eski şifreniz hatalı!');
        }
      }
    }

    public function cart(){
      return view('pages/cart');
    }

    public function category(){
      return view('pages/category');
    }

    public function page($p_id){
      return view('pages/page')->with('p_id', $p_id);
    }

    public function red_category(){
      return redirect('/category');
    }

    public function productsshow($c_id){
      $catevalues = \App\Category::where('id', $c_id)->get()->first();
      $pagevalues = array();
      if($catevalues->ParentCategory==0){
        foreach (\App\Category::where('ParentCategory', $catevalues->id)->get() as $scate) {
          foreach (\App\Product::where('Categories','LIKE','%'.$scate->id.'%')->get() as $prod) {
            array_push($pagevalues, $prod);
          }
        }
      }
      else $pagevalues = \App\Product::where('Categories','LIKE','%'.$catevalues->id.'%')->get();

      return view('pages/products')->with('catevalues',$catevalues)
      ->with('pagevalues',$pagevalues);
    }

    public function product($p_id){
      $pagevalues = \App\Product::where('id',$p_id)->get()->first();
      return view('pages/product')->with('pagevalues',$pagevalues);
    }
}
