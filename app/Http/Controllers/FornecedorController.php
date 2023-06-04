<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller{

    public function index(){

        $fornecedor = [
             [ 'nome' => 'Fornecedor 1', 'status'=> 'N', 'cnpj' => '00.000.000/0000-00', 'ddd' => '11', 'telefone' => '00000-0000'],
             [ 'nome' => 'Fornecedor 2', 'status'=> 'S', 'cnpj' => '00.000.000/0000-00', 'ddd' => '85', 'telefone' => '00000-0000'],
        ];

        //$fornecedor = [];

        // $msg =  isset($fornecedor[0]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';

        // echo $msg;


        return view('app.fornecedor.index', compact('fornecedor'));

    }

}
