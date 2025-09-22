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
        Schema::table('products', function (Blueprint $table) {
    
      $table->string("meta_title")->nullable();
      $table->string("meta_des")->nullable();
      $table->enum("produty_nav_type",["jewellery","engagement","gifting"])->nullable();
      $table->enum("product_for",['him',"her"])->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
