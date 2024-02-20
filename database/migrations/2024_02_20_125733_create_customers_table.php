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
        Schema::create('customers', function (Blueprint $table) {
                $table->string('person_code',13)->primary(); 
                $table->string('first_name'); 
                $table->string('last_name');
                $table->string('gender');
                $table->integer('age'); 
                $table->date('birthday'); 
                $table->text('address')->nullable(); 
                $table->string('job')->nullable(); 
                $table->string('email')->unique(); 
                $table->string('phone',10)->unique(); 
                $table->string('customers_code', 10); 
                $table->timestamps(); 
            });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
