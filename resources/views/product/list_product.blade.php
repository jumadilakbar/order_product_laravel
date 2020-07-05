@extends('layouts.app')

@section('content')
 
    | <a href="/product/trash">Data Trash</a> |
    
    <a href="/product/tambah" style="margin-left:900px;" class=" btn btn-success btn-sm"> + tambah data</a>
    <br>
    <br>
    <table class="table table-bordered" id="product-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'product/json',
        columns: [
            { data: 'code', name: 'code' },
            { data: 'name_product', name: 'name_product' },
            { data: 'price', name: 'price' },
            { data: 'stok', name: 'stok' },
            {data: 'action', name: 'action'},
        ]
    });
});
</script>
@endpush