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
        Schema::create('alfabet_values', function (Blueprint $table) {
            $table->id();
            $table->string('value_f');
            $table->string('value_m');
            $table->string('value_e');
            $table->string('char');
            $table->unsignedBigInteger('alfabet_id');
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
        Schema::dropIfExists('alfabet_values');
    }
};
