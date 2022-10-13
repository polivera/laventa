<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const NAME = 'name';
    public const AMOUNT = 'amount';
    public const DESCRIPTION = 'description';
    public const IS_RESERVED = 'is_reserved';

    public $table = 'products';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [self::ID, self::NAME, self::AMOUNT, self::DESCRIPTION, self::IS_RESERVED];

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

    public static function new($name, $amount, $description): Product
    {
        return Product::create([
            Product::ID => Str::uuid(),
            Product::NAME => $name,
            Product::AMOUNT => $amount,
            Product::DESCRIPTION => $description,
        ]);
    }
}
