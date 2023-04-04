<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MusicaController extends Controller
{
    public function __construct(
        private Musica $musica,
        private Genero $genero,
    ) {
    }
    public function create()
    {
        $v['title'] = 'Cadastrar musica';
        return response()->view('musica.create', $v);
    }

    public function store(Request $req)
    {
        try {
            $musica = $this->musica->newInstance();
            $musica->ds_musica = $req->input('ds_musica');
            $musica->id_disco = $req->input('id_disco');
            if ($musica->save()) {
                return redirect()->route('disco.show', \request('id_disco'))
                    ->with('success', 'Musica registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o musica: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o musica.');
    }

    public function edit($id_musica)
    {
        $v['title'] = 'Editar musica';
        $v['musica'] = $this->musica->find($id_musica);
        $v['generos'] = $this->genero->selectList();
        return response()->view('musica.edit', $v);
    }
    public function update(Request $req, $id_musica)
    {
        try {
            $musica = $this->musica->find($id_musica);
            $musica->ds_musica = $req->input('ds_musica');
            $musica->id_genero = $req->input('id_disco');
            $musica->historia = $req->input('historia');

            if ($musica->save()) {
                return redirect()->route('musica.index')->with('success', 'Artista editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o musica: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o musica.');
    }
}
