<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    //
    public function index()
    {
        $productList = $this->product->getProducts();
        return view('products.list', ['products' => $productList]);
    }
}
