<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $primaryKey = 'id_musica';

    protected $fillable = [
        'id_musica',
        'ds_musica'
    ];
}
