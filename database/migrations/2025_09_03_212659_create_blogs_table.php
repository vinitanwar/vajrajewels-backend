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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string("title")->unique();
            $table->string("slug")->unique();
            $table->string("short_des")->nullable();
            $table->string("author");
            $table->string("reading_time");
            $table->text("description")->nullable();
            $table->json("tags")->nullable();
           $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
