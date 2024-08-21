<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->string('bank');
            $table->string('account_name');
            $table->string('account_number');
            $table->decimal('price', 10, 2);
            $table->decimal('transferred_price', 10, 2);
            $table->date('transfer_date');
            $table->time('transfer_time');
            $table->text('reason')->nullable();
            $table->string('proof_of_payment_path');
            $table->unsignedBigInteger('package_id'); // Add package_id
            $table->unsignedBigInteger('bank_id'); // Add bank_id
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}