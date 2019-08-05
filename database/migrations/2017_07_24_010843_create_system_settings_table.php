<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->string('system_name');
=======
            $table->string('system_name'); 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            $table->boolean('non_vat')->default(0);
            $table->boolean('show_receipt')->default(1);
            $table->decimal('vatable');  
            $table->decimal('tax_rate'); 
<<<<<<< HEAD
            $table->decimal('service_charge')->default(0); 
            $table->string('system_mode')->default('Restaurant'); 
            $table->string('cost_layering_method')->default('First In First Out'); 
=======
            $table->string('system_mode')->default('Restaurant'); 
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
        Schema::dropIfExists('system_settings');
    }
}
