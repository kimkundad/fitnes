<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mem_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('mem_type');
            $table->integer('admin_id');
            $table->integer('pt_id');
            $table->float('pt_hr_mem', 8, 2)->nullable();
            $table->float('pt_money_mem', 8, 2)->nullable();
            $table->float('pt_money_mem_re', 8, 2)->nullable();
            $table->float('pt_hr_mem_old', 8, 2)->nullable();
            $table->integer('pt_pay_type');
            $table->integer('pay_type');
            $table->float('mem_money_mem', 8, 2)->nullable();
            $table->float('mem_money_mem_re', 8, 2)->nullable();
            $table->text('pt_note')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('mem_pays');
    }
}
