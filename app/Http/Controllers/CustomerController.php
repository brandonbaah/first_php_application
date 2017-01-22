<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CustomerController extends Controller
{
    // New function
    function customer(){
      return view('customer');
    }
}
