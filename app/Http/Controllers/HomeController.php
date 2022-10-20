<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Chef;
use App\Models\Food;
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

        return view('showCart');
    }
}
