<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;

class ProductController extends Controller
{
     public function index()
    {
        
        $product = Product::all();
        return response(['products' => new ProductResourceCollection($product),
                         'message' => 'Retrieved successfully'],
                          200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validated = Validator::make($data, [
            'name' => 'required|unique:products|max:255',
            'price' => 'required|max:255',
        ]);

        if ($validated->fails()) {
            return response(['error' => $validated->errors(), 'Validation Error']);
        }
       
        $products = Product::create($data);

        return response(['products' => new ProductResource($products), 'message' => 'Created successfully'], 201);
    }

    public function show(Product $product)
    {
        return response(['products' => new ProductResource($product), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $request, Product $product)
    {
       
        $product->update($request->all());
        
        return response(['products' => new ProductResource($product), 'message' => 'Updated successfully'], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response(['message' => 'Deleted'], 202);
    }
}
