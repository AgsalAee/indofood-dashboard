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
    public function up(): void
    {
        Schema::create('packing_reports', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->string('name_product');
            $table->string('total_product');
            $table->integer('packing_boxShA');
            $table->integer('packing_boxShB');
            $table->timestamps();

            $table->foreign('product_id')->references('product_id')->on('data_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('packing_reports', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
        });
        Schema::dropIfExists('packing_reports');
    }
};
