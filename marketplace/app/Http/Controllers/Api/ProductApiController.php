<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    // GET /api/products
    public function index()
    {
        return response()->json(Product::with('category')->get());
    }

    // POST /api/products
    public function store(Request $request)
    {
        $request->validate([
            'pd_code' => 'required|unique:products',
            'pd_name' => 'required',
            'pd_price' => 'required|numeric',
            'pd_ct_id' => 'required|exists:categories,ct_id',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'pd_code' => 'required|unique:products,pd_code,' . $id . ',pd_id',
            'pd_name' => 'required',
            'pd_price' => 'required|numeric',
            'pd_ct_id' => 'required|exists:categories,ct_id',
        ]);

        $product->update($request->all());

        return response()->json($product);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
