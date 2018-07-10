<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('eth_address')->nullable();
            $table->string('btc_address')->nullable();
            $table->string('bch_address')->nullable();
            $table->enum('kyc', ['none', 'level_1', 'level_2', 'level_3'])->default('none');
            $table->boolean('account_confirmed')->default(false);
            $table->string('referred_by')->nullable();
            $table->string('affiliate_id')->unique();
            $table->enum('role', ['user', 'manager', 'admin'])->default('user');
            $table->string('password');
            $table->ipAddress('user_ip')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
