<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('title',20);
            $table->char('type',5);
            $table->char('stage',20);
            $table->char('state',10);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('staff_id');
            $table->char('staff_name',20);
            $table->integer('allo_id');
            $table->char('allo_name',20);
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
        Schema::dropIfExists('works');
    }
}
