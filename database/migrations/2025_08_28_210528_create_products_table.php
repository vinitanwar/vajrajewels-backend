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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
    $table->string("title")->unique();
    $table->string("slug")->unique();
    $table->string("img1")->nullable();
    $table->string("img2")->nullable();
    $table->string("old_price");    
    $table->string("price");    
    $table->json("innerimages")->nullable();
    $table->text("description");
    $table->json("details")->nullable();
    $table->text("return_policy")->nullable();
    $table->text("shipping")->nullable();
    $table->integer("total_sale_count")->default(0);
    $table->boolean("status")->default(1);
    $table->enum("type",["all","male","female","kids","baby"])->default("all");

    // ✅ Category Relationship
    $table->foreignId("category_id")
          ->constrained("categories") 
          ->onDelete("cascade");      
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
