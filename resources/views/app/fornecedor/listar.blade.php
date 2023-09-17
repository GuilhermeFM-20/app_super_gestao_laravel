@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

       @include('app.fornecedor.menu')

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto; "> 
               <table border='1px' width="100%">
                        <tr style="background:grey; font-weight: bold; ">
                            <td>Nome</td>
                            <td>Site</td>
                            <td>UF</td>
                            <td>E-mail</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor['nome']}}</td>
                            <td>{{$fornecedor['site']}}</td>
                            <td>{{$fornecedor['uf']}}</td>
                            <td>{{$fornecedor['email']}}</td>
                            <td>Modificar</td>
                            <td>Excluir</td>
                        </tr>    
                    @endforeach
               </table>
            </div>
        </div>

    </div>

@endsection