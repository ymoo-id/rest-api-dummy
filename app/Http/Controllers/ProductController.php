<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json(['status' =>
                              'success',
                              'data' => $products
                              ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1'
        ]);
        $product = Product::create([
          'name' => $request->name,
          'price' => $request->price
        ]);
      return response()->json([
        'status' => 'success',
        'message' => 'produk berhasil ditambahkan',
        'data' => $product
      ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $product = Product::find($id);
      if(!$product){
        return response()->json([
          'status' => 'error',
          'message' => 'produk tidak ditemukan'
        ],404);
      }
      $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1'
        ]);
      $product->update([
        'name' => $request->name,
        'price' => $request->price
      ]);
      return response()->json([
        'status' => 'success',
        'message' => 'data berhasil dirubah',
        'data' => $product
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $product = Product::find($id);
      if(!$product){
        return response()->json([
          'status' => 'error',
          'message' => 'produk tidak ditemukan'
        ],404);
      }
      $product->delete();
      return response()->json([
        'status' => 'success',
        'message' => 'data berhasil dihapus'
      
      ]);
    }
}
