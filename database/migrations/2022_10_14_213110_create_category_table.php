<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Category::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Category::NAME);
            $table->timestamps();
        });

        Schema::table(Product::TABLE_NAME, function ($table) {
            $table->integer(Product::CATEGORY_ID)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Product::TABLE_NAME, function ($table) {
            $table->dropColumn(Product::CATEGORY_ID);
        });
        Schema::dropIfExists(Category::TABLE_NAME);
    }
};
