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

    public function index(Request $request)
    {
        if ($request->filled('id_genero')) {
            $idGenero = $request->input('id_genero');
            $idGeneroArray = explode(',', $idGenero);
            $v['title'] = 'Discos de ';
            $v['disco'] = $this->disco->whereIn('id_genero', $idGeneroArray)->get();
            $v['base64Images'] = $this->indexBase64Image($v['disco']); // Adiciona essa linha
            return response()->view('disco.index', $v);
        }

        $v['title'] = 'Discos';
        $v['disco'] = $this->disco->all();
        $v['base64Images'] = $this->indexBase64Image($v['disco']); // Adiciona essa linha
        return response()->view('disco.index', $v);
    }

    private function indexBase64Image($discos)
    {
        $base64Images = [];

        foreach ($discos as $disco) {
            $base64 = $disco->imagem;
            $base64Images[$disco->id_disco] = $base64;
        }

        return $base64Images;
    }

    public function store(Request $req)
    {

        try {
            $disco = $this->disco->newInstance();
            $disco->ds_disco = $req->input('ds_disco');
            $disco->ano = $req->input('ano');
            $disco->id_artista = $req->input('id_artista');
            $disco->id_genero = $req->input('id_genero');
            $disco->imagem = $this->getBase64Image($req->file('imagem'));
            if ($disco->save()) {
                return redirect()->route('artista.show', \request('id_artista'))
                    ->with('success', 'Disco registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o disco: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o disco.');
    }

    private function getBase64Image($imageFile)
    {
        $mimeType = $imageFile->getMimeType();
        $base64 = 'data:' . $mimeType . ';base64,' . base64_encode($imageFile->getContent());
        return $base64;
    }


    public function show($id_disco)
    {
        $id_disco = request('id_disco');
        $v['disco'] = $this->disco->find($id_disco);
        $v['base64Images'] = $this->showBase64Image($v['disco']);
        return response()->view('disco.show', $v);
    }

    private function showBase64Image($disco)
    {
        $base64Images = [
            $disco->id_disco => $disco->imagem
        ];
        return $base64Images;
    }

    public function create($id_artista, $id_genero)
    {
        $id_artista = request('id_artista');
        $v['title'] = 'Cadastrar disco';
        $v['genero'] = $this->genero->selectListId($id_genero);
        $v['artista'] = $this->artista->selectList($id_artista);

        return response()->view('disco.create', $v);
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
}
