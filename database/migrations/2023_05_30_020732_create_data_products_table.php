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
        Schema::create('data_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->string('product_name')->nullable();
            $table->string('product_total')->nullable();
            $table->float('product_mix_weight')->nullable();
            $table->float('product_addition_weight')->nullable();
            $table->float('product_si_weight')->nullable();
            $table->float('product_etiquete_weight')->nullable();
            $table->integer('product_RPM')->nullable();
            $table->integer('product_pitch')->nullable();
            $table->timestamps();

            // $table->foreign('product_id')->references('product_mat_id')->on('material_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('data_products', function (Blueprint $table) {
        //     $table->dropConstrainedForeignId('product_id');
        // });
        Schema::dropIfExists('data_products');
    }
};
