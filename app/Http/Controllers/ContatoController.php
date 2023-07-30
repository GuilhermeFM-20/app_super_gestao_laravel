<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use \App\MotivoContato;


class ContatoController extends Controller{

    public function contato(Request $request){

        //var_dump($_POST);
        //dd($request);

        // echo '<pre>';
        // print_r($request->all());        
        // echo '</pre>';
        // echo $request->input('nome');

        // $contato = new  SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo');
        // $contato->text = $request->input('mensagem');

        // //print_r($contato->getAttributes());

        // $contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        // $contato = new SiteContato();
        // $contato->create($request->all());
        //$contato->save();

        //'print_r($contato->getAttributes());

        //dd(MotivoContato::all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato',['titulo' => 'Contato','motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request){

        $request->validate(
            [
                'nome'=>'required|min:5|max:50|unique:site_contatos', 
                'telefone'=>'min:14|max:14',
                'email'=>'email',
                'motivo_contatos_id'=>'required',
                'text'=>'required|max:2000'
            ],
            [
                'nome.required'=>'O campo nome não foi preenchido.',
                'nome.min'=>'O campo nome precisa ter no mínimo três caracteres.', 
                'nome.max'=>'O campo nome deve ter no máximo cinquenta caracteres.', 
                'nome.unique'=>'Nome já cadastrado no sistema.', 
                'telefone.min'=>'Telefone incompleto.',
                'telefone.max'=>'Telefone incompleto.',
                'email.email'=>'Email inválido.',
                'motivo_contatos_id.required'=>'Preencha um motivo.',
                'text.required'=>'Preencha o campo de mensagem.',
                'text.max'=>'O campo nome deve ter no máximo dois mil caracteres.'
            ]
        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
