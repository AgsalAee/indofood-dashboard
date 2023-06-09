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
        Schema::create('packaging_p_o_s', function (Blueprint $table) {
            $table->unsignedBigInteger('process_id')->primary();
            $table->date('finish_date')->nullable();
            $table->string('shift')->nullable();
            $table->string('number_material')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packaging_p_o_s');
    }
};
