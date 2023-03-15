<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use Illuminate\Routing\Controller;

class GeneroController extends Controller
{
    public function __construct(
        private Genero $genero
    ) {}

        public function index()
    {
       $v ['title'] = 'Genero';
       $v ['genero'] = $this->genero->all();
       return response()->view('genero.index',$v);
    }
}
