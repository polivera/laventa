<?php

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductImage::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(ProductImage::NAME);
            $table->timestamps();

            $table->foreignUuid(ProductImage::PRODUCT_ID)->constrained(Product::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductImage::TABLE_NAME);
    }
};
