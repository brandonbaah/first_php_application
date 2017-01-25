@extends('layouts.app')

@section('content')
<a href="/index" class="btn btn-primary">Back to Users</a>
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

</br>
</br>
</br>
</br>
<form action="/user/{{$customer->id}}/files" method="POST" enctype="multipart/form-data">
  <div align="center">
  <input type="file" name="newfile" value="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <button type="submit">Save File</button>
</div>
</form>
@endsection
