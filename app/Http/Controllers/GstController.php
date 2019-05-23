<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Gst;

class GstController extends Controller
{
	public function index(Request $request) {
		if(empty($request->session()->get('username'))) {
			return redirect()->route('login');
		} else {
			$getGst = Gst::first();
			return view('setgst')->with('getGst',$getGst);
		}
	}

	public function setGst() {
		$input = Input::all();
		$getGst = Gst::first();
		if(array_key_exists('cgst',$input)){
			$getGst->cgst_percentage = $input['cgst'];
		}
		if(array_key_exists('sgst',$input)){
			$getGst->sgst_percentage = $input['sgst'];
		}
		if(array_key_exists('igst',$input)){
			$getGst->igst_percentage = $input['igst'];
		}
		$getGst->total_gst_percentage = $getGst->cgst_percentage+$getGst->sgst_percentage;
		$getGst->update();
		return redirect()->route('setGst');
	}
}
