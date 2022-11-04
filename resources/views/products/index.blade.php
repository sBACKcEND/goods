@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header"><h3>Products</h3></div>
                    <div class="card-body">
                        <div class="flex-col flex-grow mb-4">
                            <input type="search" class="search-field mb-0" placeholder="Search…" value=""
                                   name="s" autocomplete="off">
                            <input type="hidden" name="post_type" value="product">
                        </div>
                        <div class="flex-col flex-grow mb-4">
                            <form class="ordering" method="get">
                                <select name="order" class="order" aria-label="order">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by name</option>
                                    <option value="rating">Sort by address</option>
                                    <option value="date">Sort by city</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                                <input type="hidden" name="paged" value="1">
                            </form>
                        </div>
                        @can ('create', \App\Models\Product::class)
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add new product</a>
                        @endcan
                            <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price, $</th>
                                <th>Warehouse</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->warehouse->name }}</td>
                                    <td>

                                        @can ('update', $product)
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can ('delete', $product)
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
