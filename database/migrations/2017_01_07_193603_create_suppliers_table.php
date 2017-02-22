<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('supplier_ruc', 11)->unique();
            $table->string('supplier_businessname', 150);
            $table->string('supplier_legaladdress', 150);
            $table->string('supplier_city', 25);
            $table->string('supplier_phone', 9);
            $table->string('supplier_email', 32);
            $table->string('supplier_observation', 200);
            $table->boolean('supplier_status')->default(true);

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
        Schema::dropIfExists('suppliers');
    }
}
