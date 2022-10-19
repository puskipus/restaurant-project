<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <form action="{{ url("/addChef") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" required style="color: black">
            </div>
            <div>
                <label for="speciality">Speciality</label>
                <input type="text" name="speciality" required style="color: black">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" required>
            </div>
            <input type="submit" value="Submit">

    </form>

    <table style="border: 1px solid white">
        <tr>
            <th style="padding: 30px">Chef Name</th>
            <th style="padding: 30px">Speciality</th>
            <th style="padding: 30px">Image</th>
            <th style="padding: 30px">Action</th>
        </tr>
        @foreach ($data as $d)
            <tr align="center">
                <td>{{ $d->name }}</td>
                <td>{{ $d->speciality }}</td>
                <td><img height="100" width="100" src="/chefImage/{{ $d->image }}" alt=""></td>
                <td><a href="{{ url('/updateChef', [$d->id]) }}">Update</a></td>
                <td><a href="{{ url('/deleteChef', [$d->id]) }}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    @include('admin.adminscript')

  </body>
</html>
