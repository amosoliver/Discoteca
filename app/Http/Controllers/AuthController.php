<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                return redirect()->route('user.login')
                    ->with('success', 'Usuário registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
    }

    public function login()
    {
        $v['title'] = 'Login';

        return view('user.login', $v);
    }


    public function autenticar(Request $request)
    {
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
        'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('user.login');
    }

    public function trocarSenhaForm($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        return view('user.trocar_senha', ['user' => $user]);
    }

    public function trocarSenha(Request $request, $id)
    {
        // Lógica para trocar a senha do usuário

        return redirect()->back()->with('success', 'Senha trocada com sucesso!');
    }

    public function enviarEmailForm()
{
    return view('user.enviar_email');
}


public function enviarEmail(Request $request)
{
    $email = $request->input('email');
    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'O email não está registrado.');
    }

    // Gerar um token para a troca de senha e salvar no banco de dados
    $token = bcrypt(Str::random(40));
    $user->troca_senha_token = $token;
    $user->save();

    // Enviar o e-mail usando a função mail() do PHP
    $to = $user->email;
    $subject = 'Troca de Senha';
    $message = "Olá, {$user->name}! Você solicitou a troca de senha.\n\nClique no link a seguir para trocar sua senha: " . route('user.trocar_senha', ['token' => $token]);

    mail($to, $subject, $message);

    return redirect()->route('user.trocar_senha')->with('email', $email);
}


}
