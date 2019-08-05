<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ref_code');
<<<<<<< HEAD
            $table->string('description')->nullable();
            $table->string('customer')->nullable();
            $table->string('waiter')->nullable();
            $table->string('status')->default('vacant');
            $table->string('active')->default(1);
            $table->integer('receipt_id');
=======
            $table->string('description');
            $table->string('status');
            $table->string('receipt_id');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
        Schema::dropIfExists('tables');
    }
}
