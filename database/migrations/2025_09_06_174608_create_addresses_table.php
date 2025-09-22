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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable(); 
            $table->string('email'); 
            $table->string('phone');
            $table->string('country'); 
            $table->string('state');
            $table->string('address');
            $table->string('landmark')->nullable();
            $table->string('house_no')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city');
            $table->text('order_notes')->nullable();
            $table->boolean("selectAddress")->default(true);
            $table->foreignId('user_id')->constrained("siteusers")->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
