<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminController extends Controller
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
        return view('admin.index', ['products' => $products]);
    }
}
