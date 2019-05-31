<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('web_link')->nullable();
          $table->string('price')->default(0);
          $table->string('store')->nullable();
          $table->text('details')->nullable();
          $table->integer('count')->default(1);
          $table->string('status')->nullable();
          $table->string('image')->default('default.jpg');
          $table->integer('list_id')->unsigned();
          $table->foreign('list_id')->references('id')->on('gift_lists')->onDelete('cascade');
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
        Schema::dropIfExists('gifts');
    }
}
