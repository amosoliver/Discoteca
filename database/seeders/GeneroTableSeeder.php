<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroTableSeeder extends Seeder
{
    public function run()
    {
        $generos = ['Gospel', 'Sertanejo', 'Rock', 'Axé', 'Metal', 'Jazz', 'Samba', 'Blues'];

        foreach ($generos as $genero) {
            Genero::create([
                'ds_genero' => $genero,
            ]);
        }
    }
}

