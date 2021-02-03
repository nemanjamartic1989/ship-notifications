<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{

    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_number', 8)->unique();
            $table->text('image');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
