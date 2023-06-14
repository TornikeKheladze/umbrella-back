<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images', 'categories')->orderBy('created_at', 'desc')->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);

        $product->categories()->attach($request['category']);

        foreach (request()->image as $imageFile) {
            $path = $imageFile['originFileObj']->store('images');
            Image::create([
                'image' =>  'http://127.0.0.1:8000/storage/' . $path,
                'product_id' => $product->id
            ]);
        }

        return 'Product Created';
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('images', 'categories')->get();
        return response()->json($product);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::where('id', $request['id'])->delete();
        return 'Product deleted';
    }
}
