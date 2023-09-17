<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedor;

class FornecedorController extends Controller{

    public function index(){

        // $fornecedor = [
        //      [ 'nome' => 'Fornecedor 1', 'status'=> 'N', 'cnpj' => '00.000.000/0000-00', 'ddd' => '11', 'telefone' => '00000-0000'],
        //      [ 'nome' => 'Fornecedor 2', 'status'=> 'S', 'cnpj' => '00.000.000/0000-00', 'ddd' => '85', 'telefone' => '00000-0000'],
        // ];

        //$fornecedor = [];

        // $msg =  isset($fornecedor[0]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';

        // echo $msg;

        
        $fornecedor = Fornecedor::all();

        return view('app.fornecedor.index',['fornecedores' => $fornecedor]);

    }


    public function listar(Request $request){

        //dd($request->all());

        $fornecedor = Fornecedor::where('nome','like','%'.$request->input('nome').'%')->where('site','like','%'.$request->input('site').'%')->where('uf','like','%'.$request->input('uf').'%')->where('email','like','%'.$request->input('email').'%')->get();

        //dd($fornecedor);

        return view('app.fornecedor.index',['fornecedores' => $fornecedor, 'request' => $request->all()]);

    }


    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != ''){
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = "Cadastro efetuado com sucesso.";

        }

        return view('app.fornecedor.adicionar',[ 'msg' => $msg]);

    }

}
