<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('po_id')->primary();
            $table->date('finish_date')->nullable();
            $table->string('shift')->nullable();
            $table->unsignedBigInteger('number_material');
            $table->integer('quantity')->nullable();
            $table->timestamps();

            $table->foreign('number_material')->references('product_id')->on('data_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('process_orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('number_material');
        });
        Schema::dropIfExists('process_orders');
    }
};
