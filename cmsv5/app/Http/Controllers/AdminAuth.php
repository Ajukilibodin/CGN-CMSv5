<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\AdminLogin;

class AdminAuth extends Controller
{
    public function mainload()
    {
        if($temp = \Cookie::get('ajanlogin')){
          \Cookie::queue(\Cookie::make('ajanlogin', $temp, 24*60));
          return view('admin/index');
        }
        else return view('admin/login');
    }

    public function submit(Request $request)
    {
      $rules = [
        'username' => 'required',
        'password' => 'required'
      ];

      /*$customMessages = [
        'required' => ':attribute alanını doldurunuz.'
      ];*/

      $this->validate($request, $rules);

      $username = $request->input('username');
      $password = $request->input('password');

      $getUser = AdminLogin::where('Username', $username);

      if( $getUser->count() > 0 && \Hash::check($password ,$getUser->first()->Password) ){
        \Cookie::queue(\Cookie::forget('ajanlogin'));
        \Cookie::queue(\Cookie::make('ajanlogin', $username, 24*60)); //60 minute * 24 hour = 1 day
        $getUser->first()->LastLogin = \Carbon\Carbon::now();
        $getUser->first()->save();
        return redirect('/ajan');
      }
      else{
        return back()->with('error', 'Yanlış Kullanıcı Bilgileri');
      }
    }

    public function logout()
    {
      \Cookie::queue(\Cookie::forget('ajanlogin'));
      return redirect('/ajan');
    }

    public function nonpage()
    {
      if(\Cookie::get('ajanlogin')){
        return view('libraries/admin/nonpage');
      }
      else return redirect('/ajan');
    }
}
