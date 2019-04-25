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
            $table->string('full_name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->date('date_of_birth')->nullable();
            $table->integer('gender')->default('0');
            $table->string('about_me')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipcode')->nullable();
            $table->integer('email_verified')->default('0');
            $table->string('profile_file')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('type_id')->default('0');
            $table->dateTime('last_visit_time')->nullable();
            $table->dateTime('last_action_time')->nullable();
            $table->dateTime('last_password_change')->nullable();
            $table->integer('login_error_count')->nullable();
            $table->string('activation_key')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->string('access_token')->nullable();
            $table->string('timezone')->nullable();
            $table->string('created_by_id')->nullable();
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
