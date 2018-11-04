<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('sn',5);
            $table->char('name',20);
            $table->char('type',10);
            $table->decimal('pro_price',10);
            $table->decimal('sell_price',10);
            $table->char('unit',5);
            $table->smallInteger('inventory')->nullable()->default(0);
            $table->mediumInteger('inventory_in')->nullable()->default(0);
            $table->mediumInteger('inventory_out')->nullable()->default(0);
            $table->smallInteger('inventory_alarm');
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
        Schema::dropIfExists('product');
    }
}
