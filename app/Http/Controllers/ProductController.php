<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DataTables;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function show_product()
    {
    	// mengambil data dari table pegawai
    	$product = DB::table('products')->get();
 
    	// mengirim data pegawai ke view index
    	return view('welcome',['product' => $product]);
 
    }

    public function json(){
        // return Datatables::of(User::all())->make(true);
        $data = Product::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                        $btn = '<a href="/product/edit/'.$row->code.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        $btn = $btn.' <a href="/product/hapus/'.$row->code.'" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function index(){
        return view('product.list_product');
    }

    public function tambah() { 
        return view('product.tambah'); 
    }
    public function aksi_tambah(Request $request)
    {
    	$this->validate($request,[
    		'name_product' => 'required',
            'price' => 'required',
            'stok' => 'required'
    	]);
 
        Product::create([
    		'name_product' => $request->name_product,
            'price' => $request->price,
            'stok' => $request->stok
    	]);
 
    	return redirect('/product');
    }
    public function edit($code)
    {
        // echo $code;
        $product = Product::find($code);
        return view('product.edit', ['product' => $product]);
    }

    public function update($code, Request $request)
    {
        $this->validate($request,[
            'name_product' => 'required',
            'price' => 'required',
            'stok' => 'required'
        ]);

        $product = Product::find($code);
        $product->name_product = $request->name_product;
        $product->price = $request->price;
        $product->stok = $request->stok;
        $product->save();
        return redirect('/product');
    }

    // hapus sementara
    public function hapus($code)
    {
        $guru = Product::find($code);
        $guru->delete();

        return redirect('/product');
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $product = Product::onlyTrashed()->get();
        return view('product.data_trash', ['product' => $product]);
    }

     // restore data guru yang dihapus
    public function kembalikan($code)
    {
            $prd = Product::onlyTrashed()->where('code',$code);
            $prd->restore();
            return redirect('/product/trash');
    }

    // / restore semua data guru yang sudah dihapus
    public function kembalikan_semua()
    { 
        $prd = Product::onlyTrashed();
        $prd->restore();

        return redirect('/product/trash');
    }

    // hapus permanen
    public function hapus_permanen($code)
    {
        // hapus permanen data guru
        $prd = Product::onlyTrashed()->where('code',$code);
        $prd->forceDelete();

        return redirect('/product/trash');
    }

    // hapus permanen semua guru yang sudah dihapus
    public function hapus_permanen_semua()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $prd = Product::onlyTrashed();
        $prd->forceDelete();

        return redirect('/product/trash');
    }
}
