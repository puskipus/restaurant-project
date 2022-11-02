<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user()
    {
        $data = User::all();
        return view("admin.users", compact("data"));
    }

    public function deleteuser($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function addFood()
    {
        $data = Food::all();
        return view('admin.addFood', compact('data'));
    }

    public function uploadFood(Request $request)
    {
        $data = new Food;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }

    public function deleteFood($id)
    {
        $data = Food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateFoodView($id)
    {
        $data = Food::find($id);
        return view("admin.updateFoodView", compact("data"));
    }

    public function update(Request $request, $id)
    {
        $data = Food::find($id);
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;


        $data->save();

        return redirect()->back();
    }

    public function viewReservation()
    {
        $data = reservation::all();

        return view("admin.adminReservation", compact('data'));
    }

    public function viewChef()
    {
        $data = Chef::all();
        return view("admin.adminChef", compact('data'));
    }

    public function addChef(Request $request)
    {
        $data = new Chef;

        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefImage', $imageName);
        $data->image = $imageName;

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();
        return redirect()->back();

    }

    public function updateChef($id)
    {
        $data = Chef::find($id);
        return view('admin.updateChef', compact('data'));
    }

    public function updateAdminChef(Request $request, $id)
    {
        $data = Chef::find($id);

        if($request->image != null) {
            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefImage', $imageName);
            $data->image = $imageName;
        }

        $data->name =$request->name;

        $data->speciality = $request->speciality;

        $data->save();
        return redirect()->back();

    }

    public function deleteChef($id)
    {
        $data = Chef::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function addChart(Request $request, $id)
    {
        if(Auth::id()) {

            $cart = new Chart();
            $cart->user_id = Auth::id();
            $cart->food_id = $id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }

    }

    public function orders()
    {
        $data = Order::all();
        return view('admin.orders', compact('data'));
    }
}
