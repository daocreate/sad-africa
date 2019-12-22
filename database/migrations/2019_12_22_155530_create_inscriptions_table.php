<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();;
            $table->integer('amount')->nullable();;
            $table->dateTime('delay')->nullable();
            $table->dateTime('date_inscription');
            $table->integer('state')->default(1);
            $table->dateTime('date_validation')->nullable();
            $table->integer('learner_id')->unsigned();
            $table->integer('formation_id')->unsigned();
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
        Schema::dropIfExists('inscriptions');
    }
}
