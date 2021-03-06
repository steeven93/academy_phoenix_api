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
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('invoices', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('plan_subscription_id')->references('id')->on('plan_subscriptions');
        });

        Schema::table('expression_numbers', function(Blueprint $table){
            $table->foreign('expression_number_category_id')->references('id')->on('expression_number_categories');
        });

        Schema::table('expression_number_categories', function(Blueprint $table){
            $table->foreign('category_id')->references('id')->on('expression_number_categories');
        });

        Schema::table('customers', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('alfabet_values', function(Blueprint $table){
            $table->foreign('alfabet_id')->references('id')->on('alfabets');
        });

        Schema::table('notes', function(Blueprint $table){
            $table->foreign('customer_id')->references('id')->on('customers');
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
