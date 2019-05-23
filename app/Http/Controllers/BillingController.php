<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Bill;
use App\Order;
use App\Gst;
use DB;
use Carbon\Carbon;
use View;
use Response;


class BillingController extends Controller
{
	public function dashboard(Request $request) {
		$date = new \DateTime();
		$count = [];
		$count['todayBillCount'] = Bill::whereDate('created_at', Carbon::today())->count();
		$count['OverallBillCount'] = Bill::count();
		$count['todayRevenue'] = Bill::whereDate('created_at', Carbon::today())->sum('ordered_total');
		$count['totalRevenue'] = Bill::sum('ordered_total');
		if(empty($request->session()->get('username'))) {
			return redirect()->route('login');
		} else {
			 return View::make('index')->with('count', $count); 
		}
	}

	public function index(Request $request) {
		if(empty($request->session()->get('username'))) {
			return redirect()->route('login');
		} else {
			return view('createbill');
		}
	}

	public function listBill() {
		$listBill = Bill::with('orders')->latest()->paginate(5);
		// echo'<pre>'; print_r($listBill); exit;
		return View::make('listbill')->with('listBill', $listBill);
	}

	public function addCurrentProduct(Request $request) {
		$input = Input::get();
		$carbon = Carbon::now();
		if($input['bill'] == 0) {
			$bill = new Bill;
			$bill->ordered_count = 1;
			$bill->ordered_total = $input['price'] * $input['quantity'];
			$bill->ordered_date = $carbon->toDateString();
			$bill->ordered_time = $carbon->toTimeString();
			if($bill->save()) {
				$order = new Order;
				$order->bills_id = $bill->bills_id;
				$order->order_name = $input['name'];
				$order->order_size = $input['size'];
				$order->order_price = $input['price'];
				$order->order_quantity = $input['quantity'];
				$order->total_price = $input['price'] * $input['quantity'];
				$order->save();
				return $order;
			}
		} else {
			$bill = Bill::find($input['bill']);
			$bill->ordered_count = $bill['ordered_count'] + 1;
			$bill->ordered_total += $input['price'] * $input['quantity'];
			$bill->ordered_date = $carbon->toDateString();
			$bill->ordered_time = $carbon->toTimeString();
			if($bill->update()) {
				$order = new Order;
				$order->bills_id = $bill->bills_id;
				$order->order_name = $input['name'];
				$order->order_size = $input['size'];
				$order->order_price = $input['price'];
				$order->order_quantity = $input['quantity'];
				$order->total_price = $input['price'] * $input['quantity'];
				$order->save();
				return $order;
			}
		}
	}

	public function deleteCurrentProduct(Request $request) {
		$order = Order::destroy(Input::get('id'));
		$bill = Bill::find(Input::get('bill'));
		$bill->ordered_count = $bill['ordered_count'] - 1;
		$bill->update();
	}

	public function billView(Request $request) {
		if(empty($request->session()->get('username'))) {
			return redirect()->route('login');
		} else {
			return view('bill');
		}
	}

	public function cancelOrder(Request $request) {
		$bill = Bill::latest()->first();
		$billDelete = Bill::destroy($bill['bills_id']);
		$whereArray = array('bills_id' => $bill['bills_id']);
		$query = DB::table('orders');
		foreach($whereArray as $field => $value) {
			$query->where($field, $value);
		}
		$query->delete();
		return view('createbill');
	}

	public function submitOrder(Request $request) {
		$billCount = Bill::latest()->get();
		$billCount = $billCount->count();
		$bill = Bill::latest()->first();
		$bill->invoice_number = $billCount;
		$bill->update();
		$order = Order::where('bills_id',$bill['bills_id'])->get();
		$sum = Order::where('bills_id',$bill['bills_id'])->sum('total_price');
		$gst = Gst::first();
		$gstTotal = $gst['total_gst_percentage']/100*$sum;
		$cgstTotal = $gst['cgst_percentage']/100*$sum;
		$sgstTotal = $gst['sgst_percentage']/100*$sum;
		$igstTotal = $gst['igst_percentage']/100*$sum;
		$grandTotal = $sum + $gstTotal;
		// print_r($grandTotal); exit;
		$data['bill'] = $bill;
		$data['order'] = $order;
		$data['sum'] = $sum;
		$data['gst'] = $gst;
		$data['cgstTotal'] = $cgstTotal;
		$data['sgstTotal'] = $sgstTotal;
		$data['igstTotal'] = $igstTotal;
		$data['grandTotal'] = $grandTotal;
		return View::make('bill')->with('data', $data);
	}

	public function searchProducts(Request $request) {
		return Product::where('products_name', 'LIKE', '%'.$request->q.'%')->orWhere('products_size', 'LIKE', '%'.$request->q.'%')->get();
	}

	public function getSizePrice(Request $request)	{
		$input = Input::get();
		$data = explode("-",$input['value']);

		return Product::where('products_name', '=', trim($data[0]))->where('products_size', '=', trim($data[1]))->first();
	}
}
