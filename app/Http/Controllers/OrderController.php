<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\order;

use DataTables; 

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){
   	 $data = Product::all();
    	 return view('order.data',['data' => $data]);
   }

    public function success_beli($code)
    {
        // echo $code;
        $product = Product::find($code);
        return view('order.success_beli', ['product' => $product]);
    }

    public function aksi_beli($code, Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
            'phone' => 'required',
            'alamat' => 'required'
    	]);
 
        order::create([
            'code' => $code,
    		'name' => $request->name,
            'phone' => $request->phone,
            'alamat' => $request->alamat
        ]);
        // echo $code;
        $product = Product::find($code);
        return view('order.success_beli', ['product' => $product]);
    	return redirect('/success_beli');
    }
}
