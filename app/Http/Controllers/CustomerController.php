<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
   public function index(){
     $customers = DB::table('Customers')->select('*')->get();
     return view('customers.index')->withCustomers($customers);
   }

   public function profile($id){
     $customer = DB::table('Customers')->select('id')->get($id);
     return view('customers.profile')->withCustomer($customer);
   }

   public function newuser()
   {
     return view('customers.newuser');
   }

   public function store(Request $request){
          // Validate the request...

          $customer = new \App\Customers();

          $customer->first_name = $request->first_name;
          $customer->last_name = $request->address_1;
          $customer->address_1 = $request->address_1;
          $customer->address_2 = $request->address_2;
          $customer->city_state_zip = $request->city_state_zip;
          $customer->contact_phone = $request->contact_phone;
          $customer->email = $request->email;
          $customer->comp_name = $request->comp_name;
          $customer->comp_address = $request->comp_address;
          $customer->comp_city_state_zip = $request->comp_city_state_zip;
          $customer->comp_phone = $request->comp_phone;

          $customer->save();

          // return redirect()->route('customers.profile', $customer->id);

    }
}
