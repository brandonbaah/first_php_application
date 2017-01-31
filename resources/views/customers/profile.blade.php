@extends('layouts.app')

@section('content')
  @if (Auth::check())
    <a href="/index" class="btn btn-primary">Back to Users</a>
  @endif
  <div align="center">
  <h3><strong>{{$customer->comp_name}}</strong></h3>
  </div>

  <ul><strong>First Name:</strong> {{$customer->first_name}}</ul>
  <ul><strong>Last Name:</strong> {{$customer->last_name}}</ul>
  <ul><strong>Address:</strong> {{$customer->address_1}}</ul>
  <ul><strong>Address 2:</strong> {{$customer->address_2}}</ul>
  <ul><strong>City/State/Zip:</strong> {{$customer->city_state_zip}}</ul>
  <ul><strong>Contact Phone:</strong> {{$customer->contact_phone}}</ul>
  <ul><strong>Email:</strong> {{$customer->email}}</ul>
  <ul><strong>Company Address:</strong> {{$customer->comp_address}}</ul>
  <ul><strong>Company City/State/Zip:</strong> {{$customer->comp_city_state_zip}}</ul>
  <ul><strong>Company Phone:</strong> {{$customer->comp_phone}}</ul>
  @if ($customer->file)
    <div align="center">
    <img src="/uploads/files/{{$customer->file}}" alt="" height="500" width="500">
    </div>
  @endif
  </br>
  </br>
  </br>
  </br>
    @unless ($customer->file)
      @unless (Auth::check())
        <div align="center">
          <h4>Please add your claim to recieve your rebate.<strong>If not included you will have to resubmit!</strong></h4>
        </div>
          <form action="/user/{{$customer->id}}/files" method="POST" enctype="multipart/form-data">
            <div align="center">
              <input type="file" name="user_file">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <button type="submit">Save File</button>
            </div>
          </form>
        @else
          <div align="center">
            <h3><strong>Please reach out to {{$customer->first_name}} to resend {{$customer->comp_name}}'s claim.</strong><br><h4>Cannot Process without attached claim file.</h4></h3>
          </div>
        @endif
    @endif
@endsection
