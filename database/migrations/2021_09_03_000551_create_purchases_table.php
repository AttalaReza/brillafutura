<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('event_id')->nullable();
            $table->string('ticket')->nullable();
            $table->integer('ticket_price')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->string('code')->nullable();
            $table->string('status')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('redirect_url')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
