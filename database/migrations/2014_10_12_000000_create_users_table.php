<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->date('date_of_birth')->default(Carbon::now()->toDateTimeString());
      $table->string('email')->unique();
      $table->string('avatar')->default('default.jpg');
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->integer('active')->default(0);
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('users');
  }
}
