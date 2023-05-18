<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(
       private User $user
    ) {
    }


    public function register(Request $req)
    {
       $user = $this->user->newInstance();
       $user->name = $req->input('name');
       $user->email = $req->input('email');
       $user->password = Hash::make($req->input('password'));
        if ($user->save()) {
        return redirect()->route('artista.show', \request('id_artista'))
            ->with('success', 'usuário registrado com sucesso!');
        }
    } catch (\Exception $ex) {
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
}
    return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
    }
}
