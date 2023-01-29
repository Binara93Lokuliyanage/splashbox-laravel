<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;



class ProfileController extends Controller
{
    function getData()
    {
        $collection = Product::all();
        return view('profile', ['collection' => $collection]);
    }
    function saveProduct(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);
        $destination = 'public/images';
        $image = $req->file('image');
        $image_name = $image->getClientOriginalName();
        $image_url = $req->file('image')->storeAs($destination, $image_name);

        $product = new Product;
        $product->title = $req->title;
        $product->image = $image_name;
        $product->icon_url = $req->category;

        $product->save();

        return redirect('profile');
    }
    function showData($id)
    {
        $data = Product::find($id);
        return view('edit', ['data' => $data]);
    }
    function updateProduct(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'category' => 'required'
        ]);

        if ($req->image2 != null) {

            $destination = 'public/images';
        $image = $req->file('image2');
        $image_name = $image->getClientOriginalName();
        $image_url = $req->file('image2')->storeAs($destination, $image_name);
            
        } else {
            $image_name = $req->image;
        }

        $data = Product::find($req->id);
        $data->title = $req->title;
        $data->image = $image_name;
        $data->icon_url = $req->category;

        $data->save();
        return redirect('profile');
    }
    function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('profile');
    }
}
