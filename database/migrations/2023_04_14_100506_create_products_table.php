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
            $table->string('title');
            $table->string('description');
            $table->string('sku');
            $table->string('image');
            $table->string('price');
            $table->string('qty');
            $table->unsignedBigInteger('category_id');
            $table->string('discount');
            $table->string('color');
            $table->boolean('status');
            $table->string('created_by');
            $table->string('updated_by');
            $table->foreign('category_id')
                  ->references('id')->on('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
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
