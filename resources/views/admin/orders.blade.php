<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <h1>Customers Orders</h1>
    <table>
        <tr align="center">
            <td style="padding: 30px">Name</td>
            <td style="padding: 30px">Phone</td>
            <td style="padding: 30px">Address</td>
            <td style="padding: 30px">Food Name</td>
            <td style="padding: 30px">Price</td>
            <td style="padding: 30px">Quantity</td>
            <td style="padding: 30px">Total Price</td>
        </tr>
        @foreach ($data as $d)
            <tr align="center" style="background-color: grey">
                <td style="padding: 30px">{{ $d->name }}</td>
                <td style="padding: 30px">{{ $d->phone }}</td>
                <td style="padding: 30px">{{ $d->address }}</td>
                <td style="padding: 30px">{{ $d->foodname }}</td>
                <td style="padding: 30px">{{ $d->price }}</td>
                <td style="padding: 30px">{{ $d->quantity }}</td>
                <td style="padding: 30px">{{ $d->price * $d->quantity }}</td>
            </tr>
        @endforeach
    </table>

    @include('admin.adminscript')

  </body>
</html>
