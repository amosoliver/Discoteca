<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroTableSeeder extends Seeder
{
    public function run()
    {
        $generos = ['Gospel', 'Sertanejo', 'Rock', 'Axé', 'Metal', 'Jazz', 'Samba', 'Blues', 'Eletrônica', 'Forró',
        'Jazz', 'MPB', 'Pagode', 'Reggae', 'Black Music', 'Classic Rock', 'Disco', 'Folk', 'Grunge', 'Hard Rock',
        'Indie', 'Progressivo', 'Ska', 'Soft Rock'];

        foreach ($generos as $genero) {
            Genero::create([
                'ds_genero' => $genero,
            ]);
        }
    }
}

