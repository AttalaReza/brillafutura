<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->integer('presale_1')->nullable();
            $table->integer('presale_1_quota')->nullable();
            $table->string('presale_1_start')->nullable();
            $table->string('presale_1_end')->nullable();
            $table->integer('presale_2')->nullable();
            $table->integer('presale_2_quota')->nullable();
            $table->string('presale_2_start')->nullable();
            $table->string('presale_2_end')->nullable();
            $table->integer('onsale')->nullable();
            $table->integer('onsale_quota')->nullable();
            $table->string('onsale_start')->nullable();
            $table->string('onsale_end')->nullable();
            $table->string('location')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('file_image')->nullable();
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
        Schema::dropIfExists('events');
    }
}
