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
       Schema::table('layouts', function (Blueprint $table) {
            $table->string("yt_link")->nullable();
            $table->string("fb_link")->nullable();
            $table->string("insta_link")->nullable();
            $table->string("x_link")->nullable();
            $table->string("linkedin_link")->nullable();
            $table->string("thread_link")->nullable();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('layouts', function (Blueprint $table) {
            //
             $table->dropColumn([
               "yt_link",
                "fb_link",
                "insta_link",
                "x_link",
                "linkedin_link",
                "thread_link",
            ]);
        });
    }
};
