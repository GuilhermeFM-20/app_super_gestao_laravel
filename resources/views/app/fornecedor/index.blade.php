@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        @include('app.fornecedor.menu')

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto; "> 
                <form method="post" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <div style="display:flex;">
                    <input type="text" name="nome" value="{{ $request['nome']}}" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" value="{{ $request['site']}}" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" value="{{ $request['uf']}}" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" value="{{ $request['email']}}" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta" style="width:10%;">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>

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
                            <td><a href="">Modificar</a></td>
                            <td><a href="{{ route('app.fornecedor.excluir',['id' => $fornecedor['id']]) }}">Excluir</a></td>
                        </tr>    
                    @endforeach
               </table>
            </div>

    </div>
{{-- 
      <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>


        <div class="informacao-pagina">
            
        </div>

    </div> --}}


@endsection