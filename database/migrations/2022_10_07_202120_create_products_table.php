<?php

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
        Schema::create(Product::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(Product::ID);
            $table->string(Product::NAME);
            $table->integer(Product::AMOUNT)->unsigned();
            $table->string(Product::DESCRIPTION)->nullable();
            $table->boolean(Product::IS_RESERVED)->default(false);
            $table->unsignedInteger(Product::RESERVED_BY)->nullable();
            $table->unsignedTinyInteger(Product::STATUS)->default(Product::STATUS_ACTIVE);
            $table->timestamps();
            $table->primary(Product::ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Product::TABLE_NAME);
    }
};
