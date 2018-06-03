<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',100);
          $table->integer('quantity');
          $table->integer('price');
          $table->string('type',100);
          $table->string('state',20);
          $table->integer('cantView');
          $table->date('start_date');
          $table->date('end_date');
          $table->text('description')->nullable();
          $table->integer('user_id')->unsigned();
          $table->integer('category_id')->unsigned();
          $table->integer('sector_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
          $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
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
        Schema::dropIfExists('publications');
    }
}
