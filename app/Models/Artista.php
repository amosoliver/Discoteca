<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Artista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_artista';

    protected $fillable = [
        'id_artista',
        'ds_artista'
    ];

    public function disco()
    {
        return $this->hasMany(Disco::class, 'id_artista');
    }

    public function genero()
    {
        return $this->belongsTo(Disco::class, 'id_genero');
    }
    public function selectList($id_artista)
    {
        $artistas = $this->orderBy('ds_artista')
            ->where('id_artista', $id_artista)
            ->get();

        $arr = [];
        foreach ($artistas as $art) {
            $arr[$art->id_artista] = $art->ds_artista;
        }
        return $arr;
    }
}
