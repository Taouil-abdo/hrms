<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id(); 
            $table->string('typeContract'); 
            $table->text('document'); 
            $table->date('startDate'); 
            $table->date('endDate'); 
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
