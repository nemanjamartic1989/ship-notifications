<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewMembersTable extends Migration
{

    public function up()
    {
        Schema::create('crew_members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('surname', 25);
            $table->string('email', 25);
            $table->unsignedBigInteger('ship_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('ship_id')->references('id')->on('ships');

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crew_members');
    }
}
