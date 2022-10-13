<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Product;

class AdminProductController extends Controller
{
    private Product $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    //
    public function index()
    {
        $products = $this->productModel->getProducts();
        return view('admin.product.list', ['products' => $products]);
    }

    public function add()
    {
        return view('admin.product.form', [
            'id' => '',
            'name' => '',
            'amount' => '',
            'description' => '',
        ]);
    }

    public function detalle($productId)
    {
        $product = $this->productModel->getById($productId);
        if (!$product) {
            abort(404, 'Page not found');
        }
        return view('admin.product.form', [
            'id' => $product->id,
            'name' => $product->name,
            'amount' => $product->amount,
            'description' => $product->description,
        ]);
    }

    public function addPost(SaveProductRequest $request)
    {
        $request->validated();
        $amount = $request->input('amount') * 100;
        Product::new(
            $request->input('name'),
            $amount,
            $request->input('description')
        );

        return redirect('/admin/productos');
    }
}
