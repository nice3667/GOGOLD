<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('doc_purchase', function (Blueprint $table) {
      $table->id();
      $table->string('package_id');
      $table->decimal('price', 8, 2);
      $table->string('discount');
      $table->string('total_amount_to_be_paid');
      $table->string('payment_channels');
      $table->string('account_number');
      $table->string('bank_name');
      $table->string('account_name');
      $table->string('transfer_money');
      $table->date('transfer_date');
      $table->time('transfer_time');
      $table->string('image_path')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('doc_purchase');
  }
};