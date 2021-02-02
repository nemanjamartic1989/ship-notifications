<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
}
