<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class poststable
{
    public static function up()
    {
        Capsule::schema()->create("posts", function (Blueprint $table) {
            $table->increments("id");
            $table->string("titulo");
            $table->string("subtitulo");
            $table->text("conteudo");
            $table->string("imagem");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->Date("date");
            $table->timestamps();
        });
    }

    public static function down() {
        Capsule::schema()->drop("posts");
    }
}