<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('paymentStatus');
            $table->string('orderStatus');
            $table->integer('subTotal');
            $table->integer('paymentTotal');
            $table->string('stripeSessionId');
            $table->dateTime('stripeSessionIdExpiry_at');
            $table->timestamps();
        });

        Schema::table('orders', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
