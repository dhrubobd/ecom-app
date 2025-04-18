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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_amount', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->decimal('payable', 8, 2);
            $table->string('customer_details', 500);
            $table->string('shipping_details', 500);
            $table->string('transaction_id', 50);
            $table->string('validation_id', 50)->default(0);
            $table->enum('delivery_status', ['pending','processing','shipped','delivered','cancelled']);
            $table->enum('payment_status', ['pending','success','fail','cancel']);
            $table->foreignId('user_id')->references('id')->on('user_profiles')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
