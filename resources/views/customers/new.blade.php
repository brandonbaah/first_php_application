<!DOCTYPE html>
<html lang="en">
    <head>
      <body>

        <form action="store" method="POST">

          <table border="0" align="center">

            <h3 align="center">User Information</h3>

            <tr>
              <td>First Name</td>
              <td align="center"><input type="text" name="firstName" size="30" /></td>
            </tr>

            <tr>
              <td>Last Name</td>
              <td align="center"><input type="text" name="lastName" size="30" /></td>
            </tr>

            <tr>
              <td>Address 1</td>
              <td align="center"><input type="text" name="address1" size="30" /></td>
            </tr>

            <tr>
              <td>Address 2(apt/bldg)</td>
              <td align="center"><input type="text" name="address2" size="30" /></td>
            </tr>

            <tr>
              <td>City/ State/ Zip</td>
              <td align="center"><input type="text" name="city" size="30" /></td>
            </tr>

            <tr>
              <td>Contact Phone</td>
              <td align="center"><input type="text" name="phone" size="30" /></td>
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
              <td align="center"><input type="text" name="compName" size="30" /></td>
            </tr>

            <tr>
              <td>Company Address</td>
              <td align="center"><input type="text" name="compAddress" size="30" /></td>
            </tr>

            <tr>
              <td>Company City/ State/ Zip</td>
              <td align="center"><input type="text" name="compCity" size="30" /></td>
            </tr>

            <tr>
              <td>Company Phone Number</td>
              <td align="center"><input type="text" name="compPhone" size="30" /></td>
              <td><input type="hidden" name="_token" value="{{ csrf_token() }}"></td>
            </tr>
          </table></br>
          <div align="center">
              <input type="submit">
          </div>
        </form>
    </body>
  </head>
</html>
