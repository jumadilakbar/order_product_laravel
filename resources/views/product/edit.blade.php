@extends('layouts.app')

@section('content')
    <h3>Form Edit Product</h3>
    <hr>
    <form method="post" action="/product/update/{{ $product->code }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label >Name Product</label>
            <input type="text" class="form-control" placeholder="Name Product" id="name_product" name="name_product" value=" {{ $product->name_product }}">
            @if($errors->has('name_product'))
                <div class="text-danger">
                    {{ $errors->first('name_product')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label >Price</label>
            <input type="number" class="form-control" placeholder="Price" id="price" name="price" value="{{ $product->price }}">
            @if($errors->has('price'))
                <div class="text-danger">
                    {{ $errors->first('price')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label >Stock</label>
            <input type="number" class="form-control" placeholder="Stock" id="stok" name="stok" value="{{ $product->stok }}">
            @if($errors->has('stok'))
                <div class="text-danger">
                    {{ $errors->first('stok')}}
                </div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop