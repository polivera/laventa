<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public const TABLE_NAME = "product_images";
    public const ID = "id";
    public const PRODUCT_ID = "product_id";
    public const NAME = "name";

    protected $fillable = [self::PRODUCT_ID, self::NAME];


    public static function new($rowData): ProductImage
    {
        return ProductImage::create($rowData);
    }

    public static function deleteForProduct($productId)
    {
        return ProductImage::where(self::PRODUCT_ID, $productId)->delete();
    }
}
