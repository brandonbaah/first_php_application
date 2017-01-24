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
     $customer = DB::table('customers')->where('id', '=', $id)->first();
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


          // $this->validate($request, [
          //   'first_name' => 'required|unique:customers|max:255',
          //   'last_name' => 'required',
          //   'address_1' => 'required',
          //   'address_2' => 'bail|required',
          //   'city_state_zip' => 'required',
          //   'contact_phone' => 'required',
          //   'email' => 'required|unique:customers',
          //   'comp_name' => 'required',
          //   'comp_address' => 'required',
          //   'comp_city_state_zip' => 'required',
          //   'comp_phone' => 'required|unique:customers'
          // ]);

          $customer->save();
          flash()->overlay('Thank You for your rebate submission', 'Rebate Hero');
          return redirect ('/');
          // return redirect()->route('customers.profile', $customer->id);
    }

    // public function edit($id){
    //   $customer = DB::table('customers')->where('id', '$id')-> ->update([);
    //
    // }

    public function approvedtoggle($customer){
      if ($customer->approved == 1) {
        $customer->approved = 2;
        $customer->update(['approved' => $customer->approved]);
        flash('User Rebate Approved! Awaiting Accounting Approval', 'success');
        return redirect ('customers.index');
      } else{
        $customer->approved = 2;
        $customer->update(['approved' => $customer->approved]);
        flash('Rebate approval status changed to pending! Awaiting Admin Approval.', 'warning');
        return redirect ('customers.index');
      }
    }
}
