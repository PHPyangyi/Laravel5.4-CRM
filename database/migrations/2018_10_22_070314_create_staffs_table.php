<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name',20);
            $table->char('number',4);
            $table->char('gender',1);
            $table->string('post',20);
            $table->string('type',4);
            $table->string('id_card',18);
            $table->string('tel',11);
            $table->string('nation',5);
            $table->string('marital_status',2);
            $table->string('entry_status',2);
            $table->date('entry_date');
            $table->date('dimission_date');
            $table->char('politics_statu',2);
            $table->char('education',2);
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
        Schema::dropIfExists('staffs');
    }
}
