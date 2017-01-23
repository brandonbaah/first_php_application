
<div align="center">
  <h3>
    Customers
  </h3>
</div>

<div class="row">
  <div class="col-md-12">
    <table class ="table">
      <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>City/State/Zip</th>
        <th>Contact Phone</th>
        <th>Email Address</th>
        <th>Company Name</th>
        <th>Company Address</th>
        <th>Company City/State/Zip</th>
        <th>Company Phone</th>
        <th>View</th>
      </thead>
      <tbody>

        @foreach ($customers as $customer)
          <tr>
            <td>{{$customer->first_name}}</td>
            <td>{{$customer->last_name}}</td>
            <td>{{$customer->address_1}}</td>
            <td>{{$customer->address_2}}</td>
            <td>{{$customer->city_state_zip}}</td>
            <td>{{$customer->contact_phone}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->comp_name}}</td>
            <td>{{$customer->comp_address}}</td>
            <td>{{$customer->comp_city_state_zip}}</td>
            <td>{{$customer->comp_phone}}</td>
            <td><a href="#" class="btn btn-default">View</a> <a href="#" class="btn btn-default">Edit</a></td>
          </tr>
        @endforeach


      </tbody>
    </table>
  </div>
</div>
