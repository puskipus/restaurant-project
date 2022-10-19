<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    @include('admin.navbar')

    <div>
        <form action="{{ url('/uploadFood') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div style="padding: 3px">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Input Title" required style="color: black">
            </div>
            <div style="padding: 3px">
                <label for="price">Price</label>
                <input type="num" name="price" placeholder="Input price" required style="color: black">
            </div>
            <div style="padding: 3px">
                <label for="image">Image</label>
                <input type="file" name="image" required>
            </div>
            <div style="padding: 3px">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="Input Description" required style="color: black">
            </div>
            <div style="padding: 3px">
                <input type="submit" value="Add" style="background-color: white; color: black">
            </div>
        </form>

        <div>
            <table style="background-color: blueviolet; margin-top: 30px">
                <tr>
                    <th style="padding: 30px">Name</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Description</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px">Action</th>
                    <th style="padding: 30px">Action2</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->description }}</td>
                    <td><img src="/foodImage/{{ $data->image }}" alt="" style="width: 100px"></td>
                    <td><a href="{{ url('/deleteFood', $data->id) }}" style="background-color: red; text-decoration: none;">Delete</a></td>
                    <td><a href="{{ url('/updateFoodView', $data->id) }}" style="background-color: red; text-decoration: none;">Update</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.adminscript')

  </body>
</html>
