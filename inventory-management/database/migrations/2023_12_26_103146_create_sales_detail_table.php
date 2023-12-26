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
        Schema::create('sales_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_id');
            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('cascade');

            $table->unsignedBigInteger('inventori_id');
            $table->foreign('inventori_id')->references('id')->on('inventori')->onDelete('cascade');

            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_detail');
    }
};
