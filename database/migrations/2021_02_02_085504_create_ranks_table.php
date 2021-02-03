<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{

    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
