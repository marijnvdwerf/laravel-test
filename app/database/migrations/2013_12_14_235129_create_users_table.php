<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function ($table) {
            /** @var $table Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->enum('role', ['PUPIL', 'TEACHER', 'PARENT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
