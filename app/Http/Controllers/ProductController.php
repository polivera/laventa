<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productModel;


    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }


    public function list()
    {
        $products = $this->productModel->getProducts();
        return view('products.list', ['products' => $products]);
    }

    //
    public function detail($productId)
    {
        $product = $this->productModel->getById($productId);
        //dd($product);
        return view('products.details', ['product' => $product]);
    }

    public function reserve($productId)
    {
        $product = $this->productModel->getById($productId);
        if (!$product) {
            return redirect('/dashboad');
        }
        $currentUserId = Auth::user()->id;
        $this->productModel->reserve($productId, $currentUserId);
        return redirect('/producto');
    }
}
