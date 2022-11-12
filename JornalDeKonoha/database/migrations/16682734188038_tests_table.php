<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class teststable
{
    public static function up()
    {
        Capsule::schema()->create("tests", function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->timestamps();
        });
    }

    public static function down() {
        Capsule::schema()->drop("tests");
    }
}