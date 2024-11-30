<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('watering_interval');
            $table->integer('fertilizing_interval')->nullable();
            $table->text('care_tips')->nullable();
            $table->string('picture')->nullable(); // Add this line
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
