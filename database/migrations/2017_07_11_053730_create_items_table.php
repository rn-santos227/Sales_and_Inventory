<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ref_code', 32)->unique();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('category_id');
            $table->integer('supplier_id');
<<<<<<< HEAD
=======
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('quantity');
            $table->decimal('cost');
            $table->decimal('price');
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
        Schema::dropIfExists('items');
    }
}
