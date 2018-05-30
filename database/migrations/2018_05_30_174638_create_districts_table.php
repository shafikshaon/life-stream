<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('districts', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('division_id')->unsigned();
      $table->foreign('division_id')->references('id')->on('divisions');
      $table->string('district_name');
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
    Schema::dropIfExists('districts');
  }
}
