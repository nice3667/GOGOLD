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
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone');
			$table->string('password');
			$table->string('unhashed_password')->nullable();
			$table->string('otp_code')->nullable();
			$table->dateTime('expire_at')->nullable();
			$table->string('bank_account_name')->nullable(); // ชื่อบัญชีธนาคาร
			$table->string('bank_name')->nullable(); // ชื่อธนาคาร
			$table->string('bank_account_number')->nullable(); // เลขที่บัญชีธนาคาร
			$table->string('status')->default('active');
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('password_reset_tokens', function (Blueprint $table) {
			$table->id();
			$table->string('email');
			$table->string('token');
			$table->timestamp('created_at')->nullable();
		});

		Schema::create('sessions', function (Blueprint $table) {
			$table->string('id')->primary();
			$table->foreignId('user_id')->nullable()->index();
			$table->string('ip_address', 45)->nullable();
			$table->text('user_agent')->nullable();
			$table->longText('payload');
			$table->integer('last_activity')->index();
		});
	}


	public function down(): void
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('password_reset_tokens');
		Schema::dropIfExists('sessions');
	}
};
