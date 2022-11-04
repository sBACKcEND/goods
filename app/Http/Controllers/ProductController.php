<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', ['warehouses'=>Warehouse::all()]);
//        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Product::create($request->all());
//        return redirect()->route('products.index');

        $product = new Product();
        $product ->name=$request->name;
        $product ->quantity=$request->quantity;
        $product ->price=$request->price;
        $product->warehouse_id=$request->warehouse_id;

        $product ->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        return view('products.update',[
//            'products'=>$product,
//            'warehouses'=>Warehouse::all()
//        ]);

        return view('products.update', ['product'=>$product, 'warehouses'=>Warehouse::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
//        $product->save();
//        return redirect()->route('products.index');

        $product ->name=$request->name;
        $product ->quantity=$request->quantity;
        $product ->price=$request->price;
        $product->warehouse_id=$request->warehouse_id;

        $product ->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function warehouseProducts($id)
    {
        return view('products.index',['products'=>Product::where('warehouse_id',$id)->get()]);
    }
}
