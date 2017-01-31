@extends('layouts.app')

@section('content')
<a href="/home" class="btn btn-primary">Back to Dashboard</a>
<a href="/approved_index" class="btn btn-primary">Go to Approved</a>
<a href="/unapproved_index" class="btn btn-primary">Go to Pending</a>
  <div align="center">
    <h3>
      Customers
    </h3>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class ="table">
        <thead>
          <th>Company Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Contact Phone</th>
          <th>Email Address</th>
          <th>Company City/State/Zip</th>
          <th>Company Phone</th>
          <th>Status</th>
          <th>Actions</th>
          <th></th>
        </thead>
        <tbody>

          @foreach ($customers as $customer)
            <tr>
              <td><h5>{{$customer->comp_name}}</h5></td>
              <td><h5>{{$customer->first_name}}</h5></td>
              <td><h5>{{$customer->last_name}}</h5></td>
              <td><h5>{{$customer->contact_phone}}</h5></td>
              <td><h5>{{$customer->email}}</h5></td>
              <td><h5>{{$customer->comp_city_state_zip}}</h5></td>
              <td><h5>{{$customer->comp_phone}}</h5></td>
              <td><h5>{{$customer->approved == 1 ? 'Pending' : 'Approved'}}</h5></td>
              <td><a href="user/{{$customer->id}}" class="btn btn-primary">View</a></td>
              @if($customer->approved == 1)
                <td><a href="/approve/{{$customer->id}}" class="btn btn-success">Mark Approved</a></td>
              @else
                <td><a href="/unapprove/{{$customer->id}}" class="btn btn-danger">Mark Pending</a></td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
