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
        $v ['title'] = 'Gênero';
        $v ['genero'] = $this->genero->all();
        return response()->view('genero.index', $v);
    }

    public function create()
    {
        $v['title'] = 'Cadastrar genero';
        return response()->view('genero.create', $v);
    }

    public function store(Request $req)
    {
        try {
            $genero = $this->genero->newInstance();
            $genero->ds_genero = $req->input('ds_genero');
            if ($genero->save()) {
                return redirect()->route('genero.index')
                    ->with('success', 'genero registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o genero: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o genero.');
    }

    public function edit($id_genero)
    {
        $v['title'] = 'Editar genero';
        $v['genero'] = $this->genero->find($id_genero);
        return response()->view('genero.edit', $v);
    }
    public function update(Request $req, $id_genero)
    {
        try {
            $genero = $this->genero->find($id_genero);
            $genero->ds_genero = $req->input('ds_genero');
            if ($genero->save()) {
                return redirect()->route('genero.index')->with('success', 'Gênero editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o gênero: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o gênero.');
    }

}
