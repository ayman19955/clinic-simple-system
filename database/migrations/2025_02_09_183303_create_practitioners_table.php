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
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->string('practitioner_name');
            $table->string('specialization'); // Specialization field
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->integer('experience_years'); // Number of years of experience
            $table->string('availability_hours'); // Availability in hours format
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practitioners');
    }
};
