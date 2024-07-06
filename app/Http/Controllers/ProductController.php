<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use TraitResponseMessage;
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function store(StoreProductRequest $request)
    {

        $validated = $request->validated();
        $product = Product::create($validated);
        if (!$product) {
            return $this->responseError('Product is not found');
        }
        return $this->responseSuccess('Created Success!');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        try {
            $product->fill($request->all());
            $product->save();

            return $this->responseSuccess('Update Product Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function destroy(Product $product)
    {
        if (!$product) {
            return $this->responseError('Product is not found !');
        }
        try {
            $product->delete();

            return $this->responseSuccess('Delete Product Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
