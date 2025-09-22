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
        Schema::table('oders', function (Blueprint $table) {
           $table->dateTime("deleverd_date")->nullable();
           $table->boolean("isreturn")->nullable();
           $table->string("whyreturn")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('oders', function (Blueprint $table) {
            //
        });
    }
};
