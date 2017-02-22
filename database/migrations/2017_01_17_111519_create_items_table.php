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

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->string('item_barcode', 15)->unique();
            $table->string('item_code', 15);
            $table->string('item_alternative_code', 15);
            $table->string('item_description', 200);
            $table->string('item_description_measure', 25);

            $table->unsignedInteger('measure_id');
            $table->foreign('measure_id')->references('id')->on('measures');

            $table->unsignedInteger('item_min_stock');
            $table->string('item_image')->default('default.png');
            $table->string('item_observations', 200);
            $table->boolean('item_status')->default(true);

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
