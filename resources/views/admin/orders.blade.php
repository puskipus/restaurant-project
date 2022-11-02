<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <div class="container">
        <h1>Customers Orders</h1>

        <form action="{{ url('/search') }}" method="GET">
            @csrf
            <input type="text" name="search" style="color: aqua">
            <input type="submit" value="Search" class="btn btn-success">
        </form>

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
    </div>

    @include('admin.adminscript')

  </body>
</html>
