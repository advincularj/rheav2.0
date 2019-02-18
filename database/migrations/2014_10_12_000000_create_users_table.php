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
//            $table->string('name');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
//            $table->string('city', 100)->nullable();
////            $table->string('state', 2)->nullable();
            $table->date('birth_date');
            $table->string('phone', 11);
            $table->string('email', 50)->unique();
          //  $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->string('status')->nullable();
            $table->string('profile_pic')->default('default.png');
            $table->rememberToken();
            $table->date('date_archived')->nullable();
            $table->timestamps();
//            $table->foreign('role_id')->references('id')->on('roles');
//            $table->foreign('specialization_id')->references('id')->on('specializations');
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
