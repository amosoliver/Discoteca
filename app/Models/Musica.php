<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $primaryKey = 'id_musica';

    use HasFactory;

    protected $fillable = [
        'id_musica',
        'ds_musica'
    ];

    public function artista()
    {
        return $this->belongsTo(Disco::class, 'id_musica', 'id_musica');
    }
}
