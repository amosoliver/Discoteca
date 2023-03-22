<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Disco;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DiscoController extends Controller
{
    public function __construct(
        private Disco $disco,
        private Genero $genero,
        private Artista $artista
    ) {
    }
    public function index()
    {
        $v ['title'] = 'Disco';
        $v ['disco'] = $this->disco->all();
        return response()->view('disco.index', $v);
    }
    public function show($id_disco)
    {
        $id_disco = request('id_disco');
        $v['disco'] = $this->disco->find($id_disco);
        $v['i'] = 1;
        return response()->view('disco.show', $v);
    }
    public function create($id_artista, $id_genero)
    {
        $id_artista = request('id_artista');
        $v['title'] = 'Cadastrar disco';
        $v['genero'] = $this->genero->selectListId($id_genero);
        $v['artista'] = $this->artista->selectList($id_artista);

        return response()->view('disco.create', $v);
    }
    public function store(Request $req)
    {
        $artista = \request('id_artista');
        $genero = \request('id_genero');
        $disco = $this->disco->newInstance();
        $disco->ds_disco = $req->input('ds_disco');
        $disco->ano = $req->input('ano');
        $disco->id_artista = $req->input('id_artista');
        $disco->id_genero = $req->input('id_genero') ;
        $disco->save();
        return redirect()->route('artista.show', \request('id_artista'));
    }
    public function edit($id_disco)
    {
        $v['title'] = 'Editar disco';
        $v['disco'] = $this->disco->find($id_disco);
        return response()->view('disco.edit', $v);
    }
    public function update(Request $req, $id_artista)
    {
        $artista = $this->artista->find($id_artista);
        $artista->ds_artista = $req->input('ds_artista');
        $artista->id_genero = $req->input('id_genero');
        $artista->historia = $req->input('historia');
        $artista->save();
        return redirect()->route('artista.index');
    }
}
