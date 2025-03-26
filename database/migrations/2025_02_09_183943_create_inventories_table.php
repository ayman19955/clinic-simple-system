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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('product_name'); // Name of product
            $table->string('product_type'); // Type (e.g., Botox, filler)
            $table->integer('quantity'); // Stock quantity
            $table->date('expiry_date'); // Expiry date of the product
            $table->text('supplier_info')->nullable(); // Supplier details
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
