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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Project name
            $table->string('title'); // Project title
            $table->text('skills'); // Skills required for the project
            $table->enum('location', ['online', 'offline']); // Location (online or offline)
            $table->string('certificate')->nullable(); // Certificate (nullable)
            $table->date('start_date'); // Start date of the project
            $table->date('end_date'); // End date of the project
            $table->unsignedBigInteger('user_id'); // Foreign key column for the user
            $table->timestamps(); // Created at and updated at columns
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
