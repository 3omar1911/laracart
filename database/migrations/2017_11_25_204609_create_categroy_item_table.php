<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategroyItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categroy_item', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('category_id')->unsigned();
            $table->integer('item_id')->unsigned();            
            $table->timestamps();
            
            $table->foreign('categroy_id')->references('id')->on('categories');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categroy_item');
    }
}
