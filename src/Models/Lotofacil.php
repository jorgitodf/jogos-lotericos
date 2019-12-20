<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lotofacil extends Model
{
    protected $table = 'easy_lottos';

    //Mass Assignment
    protected $fillable = [
        'id', 'data', 'numero_concurso', 'bola1', 'bola2', 'bola3', 'bola4', 'bola5', 'bola6', 'bola7', 'bola8', 'bola9', 
        'bola10', 'bola11', 'bola12', 'bola13', 'bola14', 'bola15'
    ];
}