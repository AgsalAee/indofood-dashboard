<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            // $table->uuid('uuid')->primary()->default(DB::raw("uuid_generate_v4()"));
            // $table->uuid('uuid')->default(Str::uuid())->primary();
            $table->id('report_id');
            $table->unsignedBigInteger('product_id');
            $table->string('name_product');
            $table->string('total_product');
            $table->integer('packing_boxShA');
            $table->integer('packing_boxShB');
            $table->timestamps();

            $table->foreign('product_id')->references('product_id')->on('data_products');
        });
        // DB::statement('UPDATE packing_reports SET uuid = ' . DB::getPdo()->quote(Str::uuid()) . ' WHERE uuid IS NULL');
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
