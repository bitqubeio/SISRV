<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('purchase_type_currency');

            $table->integer('paymentcondition_id')->unsigned();
            $table->foreign('paymentcondition_id')->references('id')->on('paymentconditions');

            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->string('purchase_document', 45);

            $table->string('purchase_document_number_series', 3);
            $table->string('purchase_document_number', 8);

            $table->boolean('purchase_igv');

            $table->string('purchase_guide_number_series', 3);
            $table->string('purchase_guide_number', 8);

            $table->date('purchase_emission_date');

            $table->string('purchase_description', 500);

            $table->string('purchase_notes', 500);

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
        Schema::dropIfExists('purchases');
    }
}
