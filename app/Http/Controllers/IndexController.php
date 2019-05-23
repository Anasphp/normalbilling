<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
    	if(empty($request->session()->get('username'))) {
            return redirect()->route('login');
        } else {
            return view('index');
        }
    }
}
