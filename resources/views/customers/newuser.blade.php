@extends('layouts.app')

@section('content')
        <h5>All fields required for submission ***</h5>

        <div align="center">
          <h3>
            Rebate Hero</br>
            <h4>
              Complete this to receive your guaranteed rebate.
            </h4>
          </h3></br>
        </div>


        <form action="store" method="POST">

          <table border="0" align="center">

            <h3 align="center">User Information</h3>

            <tr>
              <td>First Name</td>
              <td align="center"><input type="text" name="first_name" size="30" /></td>
            </tr>

            <tr>
              <td>Last Name</td>
              <td align="center"><input type="text" name="last_name" size="30" /></td>
            </tr>

            <tr>
              <td>Address 1</td>
              <td align="center"><input type="text" name="address_1" size="30" /></td>
            </tr>

            <tr>
              <td>Address 2 (apt/bldg) </td>
              <td align="center"><input type="text" name="address_2" size="30" /></td>
            </tr>

            <tr>
              <td>City/ State/ Zip</td>
              <td align="center"><input type="text" name="city_state_zip" size="30" /></td>
            </tr>

            <tr>
              <td>Contact Phone</td>
              <td align="center"><input type="text" name="contact_phone" size="30" /></td>
            </tr>

            <tr>
              <td>Email Address</td>
              <td align="center"><input type="text" name="email" size="30" /></td>
            </tr>
          </table>

            <h3 align ="center"> Company Information </h3>

          <table border="0" align="center">
            <tr>
              <td>Company Name</td>
              <td align="center"><input type="text" name="comp_name" size="30" /></td>
            </tr>

            <tr>
              <td>Company Address</td>
              <td align="center"><input type="text" name="comp_address" size="30" /></td>
            </tr>

            <tr>
              <td>Company City/ State/ Zip</td>
              <td align="center"><input type="text" name="comp_city_state_zip" size="30" /></td>
            </tr>

            <tr>
              <td>Company Phone Number</td>
              <td align="center"><input type="text" name="comp_phone" size="30" /></td>
              <td><input type="hidden" name="_token" value="{{ csrf_token() }}"></td>
            </tr>
          </table></br>
          <div align="center">
              <input type="submit">
          </div>
        </form></br>

        </div>
@endsection
