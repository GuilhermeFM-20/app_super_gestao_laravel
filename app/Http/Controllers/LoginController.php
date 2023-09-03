<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller{

    public function index(Request $request){

        $erro = $request->get('erro');

        if($erro == 1){
            $erro = 'Login ou senha inválido!';
        }

        if($erro == 2){
            $erro = 'Necessário realizar o login!';
        }

        return view('site.login',['titulo'=>'Login','erro'=>$erro]);

    }

    public function autenticacao(Request $request){

        //print_r($_POST);exit;

        $regras = [
            'login' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'login.required' => 'O campo login é obrigatório!',
            'login.email' => 'O campo login é obrigatório ser um endereço de email!',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        $request->validate($regras,$feedback);

        //print_r($request->all());

        $login = $request->get('login');
        $password = $request->get('senha');

        $usuario = User::where('email','=',$login)->where('password','=',$password)->get()->first();

        if(isset($usuario->name)){

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.home');

        }

        return redirect()->route('site.login',['erro'=>1]);

    }

    public function sair(){

        session_destroy();

        return redirect()->route('site.index');

    }
    
}
