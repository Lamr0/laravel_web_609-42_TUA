<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->unsignedBigInteger('category_id');
            $table->decimal('weight', 10, 3);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories')
                ->onUpdate('cascade')->onDelete('restrict');
        });
        DB::statement('ALTER TABLE products ADD CONSTRAINT products_weight_check CHECK (weight >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
