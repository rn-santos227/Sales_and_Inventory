<<<<<<< HEAD
`<?php
=======
<?php
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_code');
            $table->string('name');
            $table->integer('qty');
            $table->decimal('cost');
            $table->decimal('price');
            $table->decimal('subtotal');
            $table->integer('receipt_id');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
        $statement = 'ALTER TABLE orders AUTO_INCREMENT = 10000000;';
        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
