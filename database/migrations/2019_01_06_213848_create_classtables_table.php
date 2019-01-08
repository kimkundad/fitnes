<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasstablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classtables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_event');
            $table->integer('class_id');
            $table->integer('t_id')->nullable();
            $table->string('color_event');
            $table->dateTime('start_event');
            $table->dateTime('end_event');
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
        Schema::dropIfExists('classtables');
    }
}
