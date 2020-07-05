@extends('layouts.app')

@section('content')
 
    <br/>
    <table class="table table-bordered" id="product-table">
        <thead>
            <tr>
                <th>Name Product</th>
                <th>Total Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $g)
            <tr>
                <td>{{ $g->name_product }}</td>
                <td>{{ $g->price }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
