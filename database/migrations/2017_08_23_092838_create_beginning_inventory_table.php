<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeginningInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beginning_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_id');
            $table->string('name');
            $table->string('ref_code')->unique();
            $table->integer('quantity');
            $table->decimal('cost');
            $table->decimal('price');
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
        Schema::dropIfExists('beginning_inventory');
    }
}
