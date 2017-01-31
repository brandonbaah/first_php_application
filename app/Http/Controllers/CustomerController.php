<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Image;


class CustomerController extends Controller
{
   public function index(){
     $customers = DB::table('customers')->select('*')->get();
     $approved_customers = DB::table('customers')->where('approved', 2)->get();
     $unapproved_customers = DB::table('customers')->where('approved', 1)->get();
     return view('customers.index', compact('customers', 'approved_customers', 'unapproved_customers'));
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
    }

    public function approve($id){
        DB::table('customers')->where('id', $id)->update(['approved' => 2]);
        flash('Customer Rebate Approved! Awaiting Accounting Approval', 'success');
        return redirect('/index');
    }

    public function approve_all(){
      DB::table('customers')->where('approved', 1)->update(['approved' => 2]);
      flash('All Pending Customers Marked Approved! Awaiting Accounting Approval', 'success');
      return redirect('/index');
    }

    public function unapprove($id){
        DB::table('customers')->where('id', $id)->update(['approved' => 1]);
        flash('Customer Rebate Marked as Pending', 'danger');
        return redirect('/index');
    }

    public function approved_index(){
      $customers = DB::table('customers')->select('*')->get();
      $approved_customers = DB::table('customers')->where('approved', 2)->get();
      $unapproved_customers = DB::table('customers')->where('approved', 1)->get();
      return view('customers.approved_index', compact('customers', 'approved_customers', 'unapproved_customers'));
    }

    public function unapprove_all(){
      DB::table('customers')->where('approved', 2)->update(['approved' => 1]);
      flash('All Approved Customers Marked Pending!', 'warning');
      return redirect('/index');
    }

    public function unapproved_index(){
      $customers = DB::table('customers')->select('*')->get();
      $approved_customers = DB::table('customers')->where('approved', 2)->get();
      $unapproved_customers = DB::table('customers')->where('approved', 1)->get();
      return view('customers.unapproved_index', compact('customers', 'approved_customers', 'unapproved_customers'));
    }

    public function upload(Request $request, $id){
      echo "upload here";
      if($request->hasFile('user_file')){
        $file = $request->file('user_file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save(public_path('uploads/files/' . $filename));
        $customer = DB::table('customers')->where('id', $id)->update(['file' => $filename]);
      }
      return redirect('/');
    }
}
