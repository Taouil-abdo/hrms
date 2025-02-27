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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('message'); // Message content
            $table->string('type'); // Type of notification
            $table->timestamp('read_at')->nullable(); // Timestamp when the notification was read (nullable)
            $table->unsignedBigInteger('user_id'); // Foreign key column for the user
            $table->timestamps(); // Created at and updated at columns

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
