<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentconditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentconditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paymentcondition_name', 25)->unique();
            $table->string('paymentcondition_mode', 25);
            $table->unsignedInteger('paymentcondition_payments')->default(0);
            $table->unsignedInteger('paymentcondition_term')->default(0);
            $table->boolean('paymentcondition_status')->default(true);
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
        Schema::dropIfExists('paymentconditions');
    }
}
