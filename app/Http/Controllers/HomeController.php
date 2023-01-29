<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getData(){
        $collection = Product::all();
        return view('home', ['collection'=>$collection]);
    }
}
