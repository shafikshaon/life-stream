<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('img_path')->nullable();
      $table->string('blood_group');
      $table->string('phone_number');
      $table->string('date_of_birth')->nullable();
      $table->string('weight')->nullable();
      $table->string('district');
      $table->string('upazila');
      $table->boolean('is_show_phone_number')->default(1);
      $table->boolean('is_show_email')->default(1);
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
      Schema::dropIfExists('profiles');
  }
}
