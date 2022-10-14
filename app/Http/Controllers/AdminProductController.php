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

    public function detail($productId)
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

    public function save(SaveProductRequest $request)
    {
        $request->validated();
        $amount = intval($request->input('amount') * 100);

        $dataToStore = [
            Product::NAME => $request->input('name'),
            Product::AMOUNT => $amount,
            Product::DESCRIPTION => $request->input('description')
        ];

        if ($request->input('id', null)) {
            Product::change($request->input('id'), $dataToStore);
        } else {
            Product::new($dataToStore);
        }

        return redirect('/admin/productos');
    }
}
