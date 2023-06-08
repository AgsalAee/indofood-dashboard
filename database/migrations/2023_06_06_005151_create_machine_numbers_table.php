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
        Schema::create('machine_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('machine_id')->primary();
            $table->boolean('status')->nullable();
            $table->unsignedBigInteger('id_group');
            $table->unsignedBigInteger('id_product_code');
            $table->integer('id_downtime')->nullable();
            $table->timestamps();

            $table->foreign('id_group')->references('group_id')->on('machine_groups');
            $table->foreign('id_product_code')->references('product_id')->on('data_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_numbers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_group');
            $table->dropConstrainedForeignId('id_product_code');
        });
        Schema::dropIfExists('machine_numbers');
    }
};
