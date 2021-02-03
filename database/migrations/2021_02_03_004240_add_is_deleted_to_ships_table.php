<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeletedToShipsTable extends Migration
{

    public function up()
    {
        Schema::table('ships', function (Blueprint $table) {
            $table->tinyInteger('is_deleted')->after('image');
        });
    }

    public function down()
    {
        Schema::table('ships', function (Blueprint $table) {
            $table->removeColumn('is_deleted');
        });
    }
}
