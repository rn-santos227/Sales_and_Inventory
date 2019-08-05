<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total');
            $table->decimal('vatable');
            $table->decimal('vat');
            $table->decimal('vat_exempt');
            $table->decimal('vat_zero')->default(0);
            $table->decimal('vat_sales');
            $table->integer('count');
            $table->decimal('amount_due');
            $table->decimal('cash');
            $table->decimal('change_due');
            $table->integer('user_id');
<<<<<<< HEAD
            $table->string('service_type')->nullable();
            $table->string('station_id');
            $table->string('mode');
            $table->string('status');
            $table->integer('promo_id')->nullable();
=======
            $table->string('station_id');
            $table->string('mode');
            $table->string('status');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            $table->timestamps();
        });

        $statement = 'ALTER TABLE receipts AUTO_INCREMENT = 10000000;';
        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
