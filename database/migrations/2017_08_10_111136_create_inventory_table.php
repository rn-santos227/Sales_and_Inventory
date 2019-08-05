<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
<<<<<<< HEAD
            $table->string('ref_code');
            $table->integer('quantity');
            $table->decimal('cost');
            $table->decimal('price');
            $table->decimal('tax');
            $table->integer('reorder_point');
            $table->integer('supplier_id');
            $table->date('expiration_date');
=======
            $table->string('ref_code', 32)->unique();
            $table->integer('quantity');
            $table->decimal('cost');
            $table->decimal('price');
            $table->integer('reorder_point');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('inventory');
    }
}
