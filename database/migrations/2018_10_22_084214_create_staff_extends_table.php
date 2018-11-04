<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffExtendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_extends', function (Blueprint $table) {
            //$table->increments('id');
            $table->engine = 'InnoDB';
            $table->integer('staff_id');
            $table->string('health',30);
            $table->string('specialty',20);
            $table->string('registered',10);
            $table->string('registered_address',20);
            $table->date('graduate_date');
            $table->string('graduate_college',20);
            $table->string('intro',150);
            $table->text('details');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_extends');
    }
}
