<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    protected $productModel;


    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    //
    public function detail($productId)
    {
        $product = $this->productModel->getById($productId);
        //dd($product);
        return view('products.details', ['product' => $product]);
    }
}
