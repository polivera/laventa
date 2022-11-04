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
        $reservedProducts = $this->productModel->countReservedProducts(Auth::user()->id);
        $products = $this->productModel->getAvailableProducts();
        return view('products.list', ['products' => $products, 'countReserved' => $reservedProducts]);
    }

    //
    public function detail($productId)
    {
        $product = $this->productModel->getById($productId);
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
        return redirect('/productos');
    }
}
