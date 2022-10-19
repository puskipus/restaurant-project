<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <form action="{{ url('updateAdminChef', [$data->id]) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="name">Chef Name</label>
            <input type="text" name="name" value="{{ $data->name }}" required style="color: black">
        </div>
        <div>
            <label for="speciality">Speciality</label>
            <input type="text" name="speciality" value="{{ $data->speciality }}" required style="color: black">
        </div>
        <div>
            <label for="oldImage">Old Image</label>
            <img width="100" height="100" src="/chefImage/{{ $data->image }}" alt="">
        </div>
        <div>
            <label for="image">New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
    @include('admin.adminscript')

  </body>
</html>
