<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'categories';
    public const ID = 'id';
    public const NAME = 'name';


    public function getAllCategories()
    {
        return Category::all();
    }
}
