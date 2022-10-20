<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminUserController extends Controller
{
    private Product $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    //
    public function index()
    {
        echo "some user admin";
    }
}
