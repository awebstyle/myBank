<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('accountNumber');
            $table->string('city');
            $table->string('email')->unique();
            $table->integer('balance');
            $table->integer('phone');
            $table->integer('cmic');
            $table->string('accountType');
            $table->string('address');
            $table->string('password');
            $table->string('source');
            $table->string('photo');
            $table->string('branchName');
            $table->string('branchCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
