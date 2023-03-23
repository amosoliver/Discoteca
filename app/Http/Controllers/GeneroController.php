<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GeneroController extends Controller
{
    public function __construct(
        private Genero $genero
    ) {
    }

    public function index()
    {
        $v ['title'] = 'Genero';
        $v ['genero'] = $this->genero->all();
        return response()->view('genero.index', $v);
    }
    public function show($id_genero)
    {
        $id_genero = request('id_genero');
        $v['genero'] = $this->genero->find($id_genero);
        return response()->view('genero.show', $v);
    }
}
