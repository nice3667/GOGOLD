<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('package_descriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->text('descriptions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('package_descriptions', function (Blueprint $table) {
            $table->dropForeign(['package_id']);
        });
        Schema::dropIfExists('package_descriptions');
    }
};