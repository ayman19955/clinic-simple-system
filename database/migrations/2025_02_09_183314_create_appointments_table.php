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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign key reference to clients
            $table->foreignId('practitioner_id')->constrained('practitioners')->onDelete('cascade'); // Foreign key reference to practitioners
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('treatment_type'); // Type of treatment
            $table->enum('status', ['scheduled', 'completed', 'canceled']); // Status of appointment
            $table->text('notes')->nullable(); // Additional notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
