@extends('layouts.app')

@section('content')
 
    
    |   <a href="/product">Data Product</a>
    | <a href="/product/trash">Data Trash</a>
    <br>
    <a href="/product/kembalikan_semua">Kembalikan Semua</a>
    |
    <a href="/product/hapus_permanen_semua">Hapus Permanen Semua</a>
    <br/>
    <br/>
    <table class="table table-bordered" id="product-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $g)
            <tr>
                <td>{{ $g->name_product }}</td>
                <td>{{ $g->price }}</td>
                <td>{{ $g->stok }}</td>

                <td>
                    <a href="/product/kembalikan/{{ $g->code }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/product/hapus_permanen/{{ $g->code }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
