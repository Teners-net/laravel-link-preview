<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('link_previews', function (Blueprint $table) {
      $table->id();
      $table->string('url');
      $table->string('icon')->nullable();
      $table->string('title')->nullable();
      $table->string('description')->nullable();
      $table->string('cover')->nullable();
      $table->string('author')->nullable();
      $table->text('keywords')->nullable();
      $table->string('video')->nullable();
      $table->string('video_type')->nullable();
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
    Schema::dropIfExists('link_previews');
  }
};
