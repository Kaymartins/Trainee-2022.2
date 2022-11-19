<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post Extends Model
{

    protected $fillable = [
        "id",
        "titulo",
        "conteudo",
        "imagem",
        "user_id",
        "date"
    ];

}