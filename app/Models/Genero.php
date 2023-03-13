<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_genero';


    protected $fillable = [
       'id_genero',
       'ds_genero'
   ];
    public function selectList()
    {
        $generos = $this->orderBy('ds_genero')
            ->get();

        $arr = [];
        foreach ($generos as $gen) {
            $arr[$gen->id_genero] = $gen->ds_genero;
        }
        return $arr;
    }

}

