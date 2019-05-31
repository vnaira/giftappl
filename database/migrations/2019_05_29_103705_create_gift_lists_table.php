<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_lists', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('type');
          $table->boolean('public');
          $table->date('date');
          $table->string('description');
          $table->timestamps();
        });
      Schema::table('gift_lists', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');

        $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_lists');
    }
}
