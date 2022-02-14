<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('users');
        });
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('list_addresses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('invoice_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropForeign(['id']);
        });
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        Schema::table('list_addresses', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
        });
        Schema::table('invoice_details', function (Blueprint $table) {
             $table->dropForeign(['product_id']);
             $table->dropForeign(['invoice_id']);
        });
        Schema::table('invoices', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
        });
        Schema::table('reviews', function (Blueprint $table) {
             $table->dropForeign(['id']);
        });
    }
}
