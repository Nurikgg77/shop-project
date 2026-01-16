<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable(); // Сделали nullable

            $table->decimal('price', 10, 2);
            $table->integer('year')->nullable();

            $table->string('image')->nullable(); // ✅ Можно добавлять картинки

            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->cascadeOnDelete();

            $table->foreign('brand_id')
                  ->references('id')->on('brands')
                  ->nullOnDelete(); // Если бренд удалён, ставим NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
