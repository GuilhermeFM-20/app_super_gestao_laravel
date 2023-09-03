@extends('site.layouts.basico')
@section('titulo',$titulo)
@section('conteudo') 
<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        
    </div>
</div>

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal" style="width:30%; margin-left:auto; margin-right:auto; border:1px solid grey; border-radius:4px; padding:10px;">

            <br>

            @if(isset($erro) && $erro != '')
                <p style="color:red;">{{$erro}}</p>
            @endif
            
            <form method="post" action="{{ route('site.login') }}">
                @csrf
                <input type="text" name="login" value="{{ old('login')}}" placeholder="Login">
                {{ $errors->has('login') ? $errors->first('login') : ''}}
                <input type="password" name="senha" value="{{ old('senha')}}" placeholder="Senha">
                {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                <button type="submit" class="borda_preta">Entrar</button>
            </form>

        </div>
    </div>  
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="img/facebook.png">
        <img src="img/linkedin.png">
        <img src="img/youtube.png">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="img/mapa.png">
    </div>
</div>
@endsection