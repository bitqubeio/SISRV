<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('customer_ruc_dni', 11)->unique();
            $table->string('customer_businessname', 150);
            $table->string('customer_phone', 9);
            $table->string('customer_email', 32);
            $table->string('customer_address', 150);
            $table->string('customer_city', 25);
            $table->string('customer_observation', 200);
            $table->boolean('customer_status')->default(true);

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
        Schema::dropIfExists('customers');
    }
}
