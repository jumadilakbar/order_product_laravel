<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
class UserController extends Controller
{
    public function json(){
        // return Datatables::of(User::all())->make(true);
        $data = User::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                        $btn = '<a href="/users/edit/'.$row->id.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        $btn = $btn.' <a href="/users/hapus/'.$row->id.'" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function index(){
        return view('list_users');
    }
}