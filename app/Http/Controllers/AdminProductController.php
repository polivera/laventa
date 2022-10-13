<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('admin.product.form');
    }

    public function addPost(Request $request)
    {
        //@todo validation
        $amount = $request->input('amount') * 100;
        Product::new(
            $request->input('name'),
            $amount,
            $request->input('description')
        );

        return redirect('/admin/productos');
    }
}
