<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewMemberRanksTable extends Migration
{

    public function up()
    {
        Schema::create('crew_member_ranks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_member_id');
            $table->unsignedBigInteger('rank_id');
            $table->timestamps();

            $table->foreign('crew_member_id')->references('id')->on('crew_members');
            $table->foreign('rank_id')->references('id')->on('ranks');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crew_member_ranks');
    }
}
