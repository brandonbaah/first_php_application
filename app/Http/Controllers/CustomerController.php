<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Image;


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
          


          $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'city_state_zip' => 'required',
            'contact_phone' => 'required|min:10',
            'email' => 'required|unique:customers,email',
            'comp_name' => 'required',
            'comp_address' => 'required',
            'comp_city_state_zip' => 'required',
            'comp_phone' => 'required'
          ]);

          $customer->save();
          return view('customers.profile')->withCustomer($customer);
          // return redirect()->route('customers.profile', $customer->id);
    }

    // public function edit($id){
    //   $customer = DB::table('customers')->where('id', '$id')-> ->update([);
    //
    // }

    public function approvedtoggle($id){
      $customer = DB::table('customers')->where('id', '=', $id)->first();
      if ($customer->approved == 1) {
        $customer->approved = 2;
        $customer->update(['approved' => $customer->approved]);
        flash('User Rebate Approved! Awaiting Accounting Approval', 'success');
      } else{
        $customer->approved = 2;
        $customer->update(['approved' => $customer->approved]);
        flash('Rebate approval status changed to pending! Awaiting Admin Approval.', 'warning');
      }

    }

    public function upload(Request $request, $id){
      if($request->hasFile('file')){
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save(public_path('uploads/files/' . $filename));
        $customer = DB::table('customers')->where('id', '=', $id)->first();
        $customer->file=$filename;
        $customer->save();
        return redirect('/');
      }
    }
}
