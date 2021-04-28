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

        Schema::create('airlines_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('airlines_id');
            $table->unsignedBigInteger('cities_id');
            $table->timestamps();

            $table->unique(['airlines_id', 'cities_id']);

            $table->foreign('airlines_id')
                ->references('id')
                ->on('airlines')
                ->onDelete('cascade');

            $table->foreign('cities_id')
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

        Schema::table('airlines_city', function (Blueprint $table) {
            $table->dropColumn('airlines_id');
            $table->dropColumn('cities_id');
        });
    }
}
