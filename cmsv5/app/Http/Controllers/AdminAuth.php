<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminLogin;

class AdminAuth extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin'))
          return view('admin/index');
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

      $this->validate($request, $rules, $customMessages);

      $username = $request->input('username');
      $password = $request->input('password');

      $getUser = AdminLogin::where('Username', $username);

      if( $getUser->count() > 0 && \Hash::check($password ,$getUser->first()->Password) ){
        \Cookie::queue(\Cookie::make('ajanlogin', $username, 24*60)); //60 minute * 24 hour = 1 day
        $getUser->first()->LastLogin = \Carbon\Carbon::now();
        $getUser->first()->save();
        return back();
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
}
