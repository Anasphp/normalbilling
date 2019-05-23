<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use View;

class ProductController extends Controller
{
    public function index(Request $request) {
    	if(empty($request->session()->get('username'))) {
            return redirect()->route('login');
        } else {
            // $value = ['status'=>''];
            // return view('addproduct',compact('value'));
            return view('addproduct');
        }
    }

    public function addProducts() {
    	$input = Input::all();
    	$product = new Product;
    	$product->products_name = $input['products_name'];
    	$product->products_size = $input['products_size'];
    	$product->products_price = $input['products_price'];
    	$product->save();
        // $value = ['status'=>'success'];
        // return redirect()->route('addProducts',compact('value'));
        return redirect()->route('addProducts');

    }

    public function listProducts() {
        $listProducts = Product::latest()->paginate(5);
        return View::make('listproduct')->with('listProducts', $listProducts);
    }
}
