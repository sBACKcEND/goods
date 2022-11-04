@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                           required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity:</label>
                                <label>
                                    <input class="form-control" type="text" name="quantity" value="{{ old('quantity') }}"
                                           required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price:</label>
                                <label>
                                    <input class="form-control" type="text" name="price" value="{{ old('price') }}"
                                           required>
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
                            <button class="btn btn-primary">Add new</button>
                            <a class="btn btn-dark mx-3 float-end" href="{{ route('products.index') }}">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

