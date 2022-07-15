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
        Schema::create('expression_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->longText('content');
            $table->longText('content_light')->nullable();
            $table->longText('content_shadow')->nullable();
            $table->longText('ipo')->nullable();
            $table->longText('iper')->nullable();
            $table->unsignedBigInteger('expression_number_category_id');
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
        Schema::dropIfExists('expression_numbers');
    }
};
