<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'products';
    public const ID = 'id';
    public const CATEGORY_ID = 'category_id';
    public const NAME = 'name';
    public const AMOUNT = 'amount';
    public const DESCRIPTION = 'description';
    public const STATUS = 'status';
    public const IS_RESERVED = 'is_reserved';
    public const RESERVED_BY = 'reserved_by';

    public const STATUS_ACTIVE = 1;
    public const STATUS_SOLD = 2;

    public $table = 'products';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        self::ID,
        self::CATEGORY_ID,
        self::NAME,
        self::AMOUNT,
        self::DESCRIPTION,
        self::IS_RESERVED,
        self::RESERVED_BY
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Retrieve all the products
     */
    public function getProducts($take = 20)
    {
        return Product::with('images')->orderBy(self::NAME)->paginate($take)->onEachSide(1);
    }

    public function getAvailableProducts($take = 20)
    {
        return Product::with('images')->where(self::IS_RESERVED, false)
            ->orderBy(self::NAME)->paginate($take)->onEachSide(1);
    }

    public function getReservedProducts($userId)
    {
        return Product::where(self::RESERVED_BY, $userId)
            ->orderBy(self::NAME)->get();
    }

    public function countReservedProducts($userId)
    {
        return Product::where(self::RESERVED_BY, $userId)->count();
    }

    public function getById($productId): ?Product
    {
        return Product::with('images')->where(self::ID, $productId)->first();
    }

    public function getFormattedAmount()
    {
        return number_format($this->amount / 100, 2);
    }

    /**
     * The amount should be a float but we treat that them
     * as integer to avoid float point errors
     */
    public function getRealAmount()
    {
        return $this->amount / 100;
    }

    public function new($fieldsArray): Product
    {
        $fieldsArray[Product::ID] = Str::uuid();
        return Product::create($fieldsArray);
    }

    public function change($id, $fieldArray)
    {
        return Product::where('id', $id)->update($fieldArray);
    }

    public function reserve($id, $userId)
    {
        return Product::where('id', $id)->update([self::IS_RESERVED => true, self::RESERVED_BY => $userId]);
    }

    public function remove($id)
    {
        return Product::where('id', $id)->delete();
    }
}
