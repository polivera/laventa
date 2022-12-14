<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\User;

class AdminProductController extends Controller
{
    private Product $productModel;
    private Category $categoryModel;
    private ProductImage $productImageModel;
    private User $userModel;

    public function __construct(Product $product, Category $category, ProductImage $productImage, User $user)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->productImageModel = $productImage;
        $this->userModel = $user;
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
            'images' => [],
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
        $userReserved = null;
        if ($product->reserved_by != null) {
            $userReserved = $this->userModel->find($product->reserved_by)->first();
        }
        return view('admin.product.form', [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'name' => $product->name,
            'amount' => $product->getRealAmount(),
            'description' => $product->description,
            'images' => $product->images,
            'userReserved' => $userReserved,
            'categories' => $categories
        ]);
    }

    public function save(SaveProductRequest $request)
    {
        $request->validated();
        $amount = intval($request->input('amount') * 100);

        $dataToStore = [
            Product::NAME => $request->input('name'),
            Product::CATEGORY_ID => $request->input('category_id'),
            Product::AMOUNT => $amount,
            Product::DESCRIPTION => $request->input('description')
        ];

        if ($request->input('id', null)) {
            $id = $request->input('id');
            $this->productModel->change($id, $dataToStore);
            $this->saveFiles($id, $request);
        } else {
            $newProduct = $this->productModel->new($dataToStore);
            $this->saveFiles($newProduct->id, $request);
        }

        return redirect('/admin/productos');
    }

    public function delete($productId)
    {
        $this->productImageModel->deleteForProduct($productId);
        $this->productModel->remove($productId);
        return redirect('/admin/productos');
    }

    private function saveFiles($productId, SaveProductRequest $request)
    {
        if ($request->allFiles()) {
            $this->productImageModel->deleteForProduct($productId);
            // todo: you are not forgetting to remove the images as well right?
            for ($ind = 1; $ind <= 4; $ind++) {
                if ($file = $request->file("image$ind", null)) {
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('image'), $filename);
                    $imageRow = [
                        ProductImage::PRODUCT_ID => $productId,
                        ProductImage::NAME => $filename,
                    ];
                    $this->productImageModel->new($imageRow);
                }
            }
        }
    }
}
