<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuth extends Controller
{
    public function submit(Request $request)
    {
      $this->validate($request,[
        'username' => 'required',
        'password' => 'required'
      ]);

      return 'Success';
    }
}
