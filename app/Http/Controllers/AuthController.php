<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private User $user
    ) {
    }
    public function create()
    {

        $v['title'] = 'Criar Usuário';
        return view('user.create', $v);
    }

    public function store(LoginRequest $req)
    {
        try {
            $user = $this->user->newInstance();
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = Hash::make($req->input('password'));
            if ($user->save()) {
                return redirect()->route('artista.index')
                    ->with('success', 'Usuário registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
    }
    public function autenticar(Request $req)
    {
        $login = $req-> validate([
           'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($login)) {
            $req->session()->regenerate();
            return redirect()->route('artista.index');
        }
        return back()->withErrors([
            'email' => 'Email Invalido',
        ])->onlyInput('email');
    }
}
