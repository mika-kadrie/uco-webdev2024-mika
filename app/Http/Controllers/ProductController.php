<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::select();

        if ($request->category) {
            $products->where('category_id', $request->category);
        }

        $products = $products->get();

        return view('products.index', [
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('products.form', [
            'title' => 'Add new product',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'category_id' => $request->category_id,
            'price'=> $request->price,
            'image'=> $request->image,
        ]);

        return redirect()->route('products.show',['id' => $product->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        return view('products.form', [
            'title' => 'Edit product',
            'product' => $product
        ]);
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = $request->image;
        $product->save();

        return redirect()->route('products.show', ['id' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product->delete();

        return redirect()->route('products.list');
    }
}
