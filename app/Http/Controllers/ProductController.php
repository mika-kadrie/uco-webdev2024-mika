<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller{
public function index()
{
    $products = collect(range(1, 20))->map(function ($id) {
        return [
            'id' => $id,
            'name' => "Product $id",
            'description' => "Description of product $id",
            'price' => rand(1000, 10000),
        ];
    });

    return view('products.list', compact('products'));
}}
