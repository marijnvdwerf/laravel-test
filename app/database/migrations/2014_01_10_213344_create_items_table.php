<?php

use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('portfolio_items', function ($table) {
            /** @var $table Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('Users');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('portfolio_items');
    }

}