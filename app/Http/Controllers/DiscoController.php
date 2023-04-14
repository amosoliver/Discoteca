<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Disco;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        try {
            $disco = $this->disco->newInstance();
            $disco->ds_disco = $req->input('ds_disco');
            $disco->ano = $req->input('ano');
            $disco->id_artista = $req->input('id_artista');
            $disco->id_genero = $req->input('id_genero');
            $path = $req->file('imagem')->store('public/capas');
            $fileName = basename($path);
            $publicPath = public_path('storage/capas');
            if (!File::isDirectory($publicPath)) {
                File::makeDirectory($publicPath, 0777, true, true);
            }
            File::copy(storage_path('app/'.$path), $publicPath.'/'.$fileName);
            $caminhoImagem = 'storage/capas/'.$fileName;
            $disco->imagem = $caminhoImagem;

            if ($disco->save()) {
                return redirect()->route('artista.show', \request('id_artista'))
                    ->with('success', 'Disco registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o disco: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o disco.');
    }

    public function edit($id_disco)
    {
        $v['title'] = 'Editar disco';
        $v['disco'] = $this->disco->find($id_disco);
        return response()->view('disco.edit', $v);
    }

    public function update(Request $req, $id_disco)
    {
        try {
            $disco = $this->disco->find($id_disco);
            $disco->ds_disco = $req->input('ds_disco');
            $disco->ano = $req->input('ano');
            $disco->id_artista = $req->input('id_artista');
            $disco->id_genero = $req->input('id_genero');
            if ($disco->save()) {
                return redirect()->route('artista.show', \request('id_artista'))
                    ->with('success', 'Disco editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o disco: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o disco.');
    }
}
