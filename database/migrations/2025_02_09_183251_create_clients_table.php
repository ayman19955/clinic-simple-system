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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('client_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']); // Enum for predefined gender values
            $table->string('contact_number');
            $table->string('email')->unique()->nullable(); // Ensures unique email
            $table->text('address');
            $table->text('medical_history')->nullable(); // Nullable medical history
            $table->text('emergency_contact')->nullable();
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
