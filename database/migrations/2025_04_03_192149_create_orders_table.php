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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'refunded'])->default('pending');  
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount')->default(0); 
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('address'); 
            $table->string('city'); 
            $table->string('phone'); 
            $table->string('state'); 
            $table->string('country'); 
            $table->string('zip'); 
            $table->string('type')->default('home'); 
            $table->string('paypal_payment_id')->nullable();
            $table->string('payment_method');
            $table->string('payment_status')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
