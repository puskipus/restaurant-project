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

    <form action="{{ url('/update', $data->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div style="padding: 3px">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $data->title }}" required style="color: black">
        </div>
        <div style="padding: 3px">
            <label for="price">Price</label>
            <input type="num" name="price" value="{{ $data->price }}" required style="color: black">
        </div>
        <div style="padding: 3px">
            <label for="image">Old Image</label>
            <img height="200" width="200" src="/foodImage/{{ $data->image }}" alt="">
        </div>
        <div style="padding: 3px">
            <label for="image">New Image</label>
            <input type="file" name="image" required>
        </div>
        <div style="padding: 3px">
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $data->description }}" required style="color: black">
        </div>
        <div style="padding: 3px">
            <input type="submit" value="Update" style="background-color: white; color: black">
        </div>
    </form>

    @include('admin.adminscript')

  </body>
</html>
