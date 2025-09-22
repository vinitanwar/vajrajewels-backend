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
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
                        $table->foreignId('user_id')->constrained("siteusers")->onDelete('cascade');
                          $table->decimal('total_amount', 10, 2);
  $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('final_amount', 10, 2);
               $table->enum('payment_method', ['cod', 'razorpay'])->default('cod');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');

            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
  $table->foreignId("address_id")->constrained("addresses")->onDelete("cascade");
                              $table->string('tracking_number')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
