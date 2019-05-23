<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index(Request $request) {
        if(empty($request->session()->get('username'))) {
            return view('login');
        } else {
            return redirect()->route('index');
        }
    }

    public function login() {
            $input = Input::all();
            if($input['username'] == 'admin' && $input['password'] == 'admin') {
                session(['username' => 'Admin']);
                return redirect()->route('index');
            }

            return redirect()->route('login');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
