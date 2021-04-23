<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('businessDescription');
            $table->timestamps();
        });

        Schema::create('airline_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->unique(['airline_id', 'city_id']);

            $table->foreign('airline_id')
                ->references('id')
                ->on('airlines')
                ->onDelete('cascade');

            $table->foreign('city_id')
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
        Schema::table('airlines', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('businessDescription');
            $table->dropColumn('multiDestEnable');
        });
    }
}
