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
        Schema::create('schedule_productions', function (Blueprint $table) {
            $table->uuid('id_schedule')->primary();
            $table->unsignedBigInteger('id_product');
            $table->string('name_product');
            $table->integer('RPM_product');
            $table->integer('pitch_product');
            $table->string('shift');
            $table->integer('production_hours');
            $table->integer('machines_in_operation');
            $table->unsignedBigInteger('machine_number');
            $table->integer('tp_number');
            $table->date('schedule_date');
            $table->timestamps();

            $table->foreign('id_product')->references('product_id')->on('data_products');
            $table->foreign('machine_number')->references('machine_id')->on('machine_numbers');
        });

        // Schema::table('data_products', function (Blueprint $table) {
        //     $table->foreignId('machine_id')->nullable()->constrained('machines');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('schedule_productions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_product');
            $table->dropConstrainedForeignId('machine_number');
        });
        Schema::dropIfExists('schedule_productions');
    }
};
