<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeletedToCrewMembersTable extends Migration
{

    public function up()
    {
        Schema::table('crew_members', function (Blueprint $table) {
            $table->tinyInteger('is_deleted')->after('ship_id');
        });
    }

    public function down()
    {
        Schema::table('crew_members', function (Blueprint $table) {
            $table->removeColumn('is_deleted');
        });
    }
}
