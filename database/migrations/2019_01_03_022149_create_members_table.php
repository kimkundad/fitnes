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
            $table->string('email_mem')->nullable();
            $table->string('line_mem')->nullable();
            $table->string('facebook_mem')->nullable();
            $table->string('image_mem')->nullable();
            $table->string('address_mem')->nullable();
            $table->string('province_mem')->nullable();
            $table->string('district_mem')->nullable();
            $table->string('zip_code_mem')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('type_mem');
            $table->integer('pay_type_mem');
            $table->float('amount_mem', 8, 2);
            $table->float('re_amount_mem', 8, 2)->nullable();
            $table->text('remark_mem')->nullable();
            $table->integer('status_mem')->default('0');
            $table->integer('admin_id');
            $table->integer('pt_id')->nullable();
            $table->date('pt_end_at')->nullable();
            $table->float('pt_hr', 8, 2)->nullable();
            $table->integer('pt_pay_type_mem')->nullable();
            $table->float('pt_amount_mem', 8, 2)->nullable();
            $table->float('pt_re_amount_mem', 8, 2)->nullable();
            $table->text('pt_remark_mem')->nullable();
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
