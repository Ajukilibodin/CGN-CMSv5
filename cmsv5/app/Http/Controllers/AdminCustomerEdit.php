<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin')){
          $customers = \App\Customer::paginate(10);
          return view('admin/customers', ['customers' => $customers]);
        }
        else return view('admin/login');
    }

    public function deleteCustomer($w_id)
    {
      \App\Customer::destroy($w_id);
      return redirect('/ajan/customers');
    }
}
