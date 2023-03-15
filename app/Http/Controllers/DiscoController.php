<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Routing\Controller;

class DiscoController extends Controller
{
    public function __construct(
        private Disco $disco
    ) {}
    public function index()
    {
        $v ['title'] = 'Disco';
        $v ['disco'] = $this->disco->all();
        return response()->view('disco.index',$v);
    }

    public function show($id_disco)
    {
        $id_disco = request('id_disco');
        $v['disco'] = $this->disco->find($id_disco);
        $v['i'] = 1;
        return response()->view('disco.show',$v);
    }
    public function create() {
        $v['title'] = 'Cadastrar disco';

        return response()->view('disco.create',$v);
    }
}
