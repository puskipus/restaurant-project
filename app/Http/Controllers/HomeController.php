<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $data2 = Chef::all();
        return view("home", compact('data', 'data2'));
    }

    public function redirects()
    {
        $data = Food::all();
        $data2 = Chef::all();

        $usertype = Auth::user()->usertype;

        if ($usertype == "1") {
            return view("admin.adminhome");
        } else {
            $user_id = Auth::id();
            $count = Chart::where('user_id', $user_id)->count();
            return view("home", compact('data', 'data2', 'count'));
        }
    }

    public function showCart($id)
    {
        $count = Chart::where('user_id', $id)->count();
        $data2 = Chart::select('*')->where('user_id', '=', $id)->get();
        $data = Chart::where('user_id', $id)->join('food', 'charts.food_id', '=', 'food.id')->get();
        return view('showCart', compact('count', 'data', 'data2'));
    }

    public function remove($id)
    {
        $data = Chart::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();
        }
        return redirect()->back();
    }
}
