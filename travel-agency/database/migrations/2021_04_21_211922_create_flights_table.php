<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('departureTime');
            $table->time('arrivalTime');
            $table->unsignedBigInteger('departureCity');
            $table->unsignedBigInteger('arrivalCity');
            $table->timestamps();

            $table->foreign('departureCity')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreign('arrivalCity')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn('departureTime');
            $table->dropColumn('arrivalTime');
        });
    }
}
