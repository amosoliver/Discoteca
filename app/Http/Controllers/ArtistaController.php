<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArtistaController extends Controller
{
    public function __construct(
        private Artista $artista,
        private Genero $genero,
    ) {
    }
    public function index()
    {
        $v ['title'] = 'Artista';
        $v ['artista'] = $this->artista->all();
        return response()->view('artista.index', $v);
    }
    public function create()
    {
        $v['title'] = 'Cadastrar artista';
        $v['generos'] = $this->genero->selectList();
        return response()->view('artista.create', $v);
    }
    public function show($id_artista)
    {
        $id_artista = request('id_artista');
        $v['artista'] = $this->artista->find($id_artista);
        return response()->view('artista.show', $v);
    }
    public function store(Request $req)
    {
        try {
            $artista = $this->artista->newInstance();
            $artista->ds_artista = $req->input('ds_artista');
            $artista->id_genero = $req->input('id_genero');
            $artista->historia = $req->input('historia');

            if ($artista->save()) {
                return redirect()->route('artista.index')->with('success', 'Artista registrado com sucesso!')->delay(5);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o artista: '.$ex->getMessage())->delay(15);
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o artista.')->delay(15);
    }

    public function edit($id_artista)
    {
        $v['title'] = 'Editar artista';
        $v['artista'] = $this->artista->find($id_artista);
        $v['generos'] = $this->genero->selectList();
        return response()->view('artista.edit', $v);
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
