@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">

{{--                        <form method="POST" action="{{ isset($product)?route('products.update',$product->id):route('products.store') }}">--}}
{{--                            @csrf--}}
{{--                            @if (isset($product))--}}
{{--                                @method('put')--}}
{{--                            @endif--}}

                        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <label>
                                    <input class="form-control" type="text" name="name" value="{{ $product->name }}" required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity:</label>
                                <label>
                                    <input class="form-control" type="text" name="quantity" value="{{ $product->quantity }}" required>
                                </label>
                            </div>
                            <div  class="mb-3">
                                <label class="form-label">Price:</label>
                                <label>
                                    <input class="form-control" type="text" name="price"  value="{{ $product->price }}" required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warehouse name:</label>
                                <label>
                                <select name="warehouse_id" class="form-select">
                                    @foreach($warehouses as $warehouse)
                                        <option  value="{{$warehouse->id}}" {{ isset($product)&&($warehouse->id==$product->warehouse_id)?'selected':'' }}> {{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <button class="btn btn-primary">Update</button>
                            <a class="btn btn-dark mx-3 float-end" href="{{ route('products.index') }}">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

