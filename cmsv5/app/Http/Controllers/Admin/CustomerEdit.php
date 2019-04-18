<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin')){
          $customers = \App\Customer::where('Name','<>','Non-Customer')->paginate(10);
          return view('admin/customers', ['customers' => $customers]);
        }
        else return redirect('/ajan');
    }

    public function deleteCustomer($w_id)
    {
      if(\Cookie::get('ajanlogin')){
        \App\Customer::destroy($w_id);
        return redirect('/ajan/customers');
      }
      else return redirect('/ajan');
    }
}
