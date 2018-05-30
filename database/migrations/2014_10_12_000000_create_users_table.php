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
      $table->string('full_name', 100);
      $table->string('username', 30)->unique();
      $table->string('email', 100)->unique();
      $table->boolean('is_admin')->default(0);
      $table->boolean('is_active')->default(1);
      $table->string('password');
      $table->rememberToken();
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent('ON UPDATE CURRENT_TIMESTAMP');
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
