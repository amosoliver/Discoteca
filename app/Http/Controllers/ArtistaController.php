<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ArtistaController extends Controller
{
    public function __construct(
        private Artista $artista,
        private Genero $genero,
    ) {
    }

    public function index(Request $request)
    {
        if ($request->filled('id_genero')) {
            $idGenero = $request->input('id_genero');
            $idGeneroArray = explode(',', $idGenero);
            $v['artista'] = $this->artista->whereIn('id_genero', $idGeneroArray)->get();
            $v['title'] = 'Artistas de'  ;
            return response()->view('artista.index', $v);
        }

        $v['title'] = 'Artistas';
        $v['artista'] = $this->artista->all();
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
        $path = $req->file('imagem')->store('public/capas');
        try {
            $artista = $this->artista->newInstance();
            $artista->ds_artista = $req->input('ds_artista');
            $artista->id_genero = $req->input('id_genero');
            $artista->historia = $req->input('historia');
            $artista->imagem = $this->imagem($path);

            if ($artista->save()) {
                return redirect()->route('artista.index')->with('success', 'Artista registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o artista: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o artista.');
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
        try {
            $artista = $this->artista->find($id_artista);
            $artista->ds_artista = $req->input('ds_artista');
            $artista->id_genero = $req->input('id_genero');
            $artista->historia = $req->input('historia');

            if ($artista->save()) {
                return redirect()->route('artista.index')->with('success', 'Artista editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o artista: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o artista.');
    }

    public function imagem($path)
    {
        $fileName = basename($path);
        $publicPath = public_path('storage/capas');
        if (!File::isDirectory($publicPath)) {
            File::makeDirectory($publicPath, 0777, true, true);
        }
        File::copy(storage_path('app/' . $path), $publicPath . '/' . $fileName);
        $caminhoImagem = 'storage/capas/' . $fileName;

        return $caminhoImagem;
    }

    public function destroy($id_artista) {
        try {
            $artista = $this->artista->find($id_artista);

            if ($artista->delete()) {
                return redirect()->route('artista.index')->with('sucess', 'Artista excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o artista: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o artista.');
    }
    }

