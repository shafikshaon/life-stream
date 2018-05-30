<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpazilasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('upazilas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('district_id')->unsigned();
      $table->foreign('district_id')->references('id')->on('districts');
      $table->string('upazila_name');
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
    Schema::dropIfExists('upazilas');
  }
}
