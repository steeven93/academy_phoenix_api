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
        Schema::table('users', function(Blueprint $table){
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedBigInteger('plans_subscription_id')->nullable();
            $table->foreign('plans_subscription_id')->references('id')->on('plans_subscriptions');
        });

        Schema::table('customers', function(Blueprint $table){
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
        });

        Schema::table('invoices', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');

            $table->unsignedBigInteger('plans_subscription_id');
            $table->foreign('plans_subscription_id')->references('id')->on('plans_subscriptions');
        });

        Schema::table('expression_numbers', function(Blueprint $table){
            $table->unsignedBigInteger('expression_number_category_id');
            $table->foreign('expression_number_category_id')->references('id')->on('expression_number_categories');
        });

        Schema::table('expression_number_categories', function(Blueprint $table){
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('expression_number_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
