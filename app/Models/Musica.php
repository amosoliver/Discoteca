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

    public function artista(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Disco::class, 'id_musica', 'id_musica');
    }
}
