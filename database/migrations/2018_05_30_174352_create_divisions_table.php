<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('divisions', function (Blueprint $table) {
      $table->increments('id');
      $table->string('division_name');
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
    Schema::dropIfExists('divisions');
  }
}
