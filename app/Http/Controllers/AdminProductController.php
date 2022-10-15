<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    private Product $productModel;
    private Category $categoryModel;

    public function __construct(Product $product, Category $category)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
    }

    //
    public function index()
    {
        $products = $this->productModel->getProducts();
        return view('admin.product.list', ['products' => $products]);
    }

    public function add()
    {
        $categories = $this->categoryModel->getAllCategories();
        return view('admin.product.form', [
            'id' => '',
            'category_id' => '',
            'name' => '',
            'amount' => '',
            'description' => '',
            'categories' => $categories
        ]);
    }

    public function detail($productId)
    {
        $product = $this->productModel->getById($productId);
        if (!$product) {
            abort(404, 'Page not found');
        }
        $categories = $this->categoryModel->getAllCategories();
        return view('admin.product.form', [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'name' => $product->name,
            'amount' => $product->getRealAmount(),
            'description' => $product->description,
            'categories' => $categories
        ]);
    }

    public function save(SaveProductRequest $request)
    {
        dd($request);
        $request->validated();
        $amount = intval($request->input('amount') * 100);

        $dataToStore = [
            Product::NAME => $request->input('name'),
            Product::CATEGORY_ID => $request->input('category_id'),
            Product::AMOUNT => $amount,
            Product::DESCRIPTION => $request->input('description')
        ];

        if ($request->input('id', null)) {
            Product::change($request->input('id'), $dataToStore);
        } else {
            Product::new($dataToStore);
        }

        $this->saveFiles($request);

        return redirect('/admin/productos');
    }

    private function saveFiles(SaveProductRequest $request)
    {
        for ($ind = 1; $ind <= 4; $ind++) {
            if ($file = $request->file("image$ind", null)) {
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/image'), $filename);
                echo $filename;
                dd($filename);
            }
        }
    }
}
