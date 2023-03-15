<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    protected $primaryKey = 'id_disco';

    use HasFactory;

    protected $fillable = [
        'id_disco',
        'ds_disco',
        'ano',
        'quantidade',
        'preço',
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista', 'id_artista');
    }

    public function musica()
    {
        return $this->hasMany(Musica::class, 'id_disco');
    }

}

