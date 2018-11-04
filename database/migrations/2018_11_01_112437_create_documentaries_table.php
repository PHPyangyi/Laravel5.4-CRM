<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentaries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('sn',14);
            $table->char('title',30);
            $table->integer('client_id');
            $table->char('client_company',30);
            $table->integer('staff_id');
            $table->char('staff_name',30);
            $table->char('way',10);
            $table->char('evolve',10);
            $table->char('remark',20);
            $table->char('enter',20);
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
        Schema::dropIfExists('documentaries');
    }
}
