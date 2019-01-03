<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name_mem');
            $table->string('last_name_mem');
            $table->string('birthday_mem');
            $table->integer('sex_mem');
            $table->integer('height_mem');
            $table->integer('width_mem');
            $table->string('phone_mem');
            $table->string('email_mem');
            $table->string('line_mem');
            $table->string('facebook_mem');
            $table->string('image_mem');
            $table->string('address_mem');
            $table->string('province_mem');
            $table->string('district_mem');
            $table->string('zip_code_mem');
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('type_mem');
            $table->integer('pay_type_mem');
            $table->float('amount_mem', 8, 2);
            $table->float('re_amount_mem', 8, 2);
            $table->text('remark_mem');
            $table->integer('status_mem')->default('0');
            $table->integer('admin_id');
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
        Schema::dropIfExists('members');
    }
}
