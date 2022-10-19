<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <div style="position: relative; top: 60px; right: -200px">
        <table bg>
            <tr>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Phone</th>
                <th style="padding: 30px">Date</th>
                <th style="padding: 30px">Time</th>
                <th style="padding: 30px">Message</th>
            </tr>

            @foreach ($data as $d)
                <tr align="center">
                    <th>{{ $d->name }}</th>
                    <th>{{ $d->email }}</th>
                    <th>{{ $d->phone }}</th>
                    <th>{{ $d->date }}</th>
                    <th>{{ $d->time }}</th>
                    <th>{{ $d->message }}</th>
                </tr>
            @endforeach
        </table>
    </div>

    @include('admin.adminscript')

  </body>
</html>
