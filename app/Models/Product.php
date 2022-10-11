<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Retrieve all the products
     */
    public function getProducts($skip = 0, $take = 20)
    {
        return Product::take($take)->skip($skip)->get();
    }

    public function getById($productId)
    {
        return Product::where('id', $productId)->first();
    }

    public function getFormattedAmount()
    {
        return number_format($this->amount / 100, 2);
    }
}
