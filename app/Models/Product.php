<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function getProducts($take = 20)
    {
        return Product::orderBy(self::NAME)->paginate($take);
    }

    public function getById($productId)
    {
        return Product::where('id', $productId)->first();
    }

    public function getFormattedAmount()
    {
        return number_format($this->amount / 100, 2);
    }

    public static function new($fieldsArray): Product
    {
        return Product::create($fieldsArray);
    }

    public static function change($id, $fieldArray)
    {
        return Product::where('id', $id)->update($fieldArray);
    }
}
