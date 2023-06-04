<h3>Fornecedor</h3>

{{-- Fica o comen tário --}}

@php
 
    // comentário

@endphp

{{-- @dd($fornecedor) --}}

{{-- @if(count($fornecedor) > 0 && count($fornecedor) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedor) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else 
    <h3>Ainda não existe nenhum fornecedor cadastrado</h3>
@endif

 --}}



@isset($fornecedor)

    

    {{-- @switch($fornecedor[1]['ddd'])

        @case ('11') 
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG
            @break 
        @case ('85')
            Fortaleza - CE
            @break
        @default 
            Estado não identificado
    @endswitch --}}

    <br>
    {{-- 
    @for($i = 0; $i < count($fornecedor); $i++)
        <br><br>
        Fornecedor: {{ $fornecedor[$i]['nome'] }}
        <br>
        Statu: {{ $fornecedor[$i]['status'] }}
        <br>    
        CNPJ : {{ $fornecedor[$i]['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedor[$i]['ddd'] ?? ''}}) {{$fornecedor[$i]['telefone']}}
    @endfor  --}}

    
    {{-- @while($i < count($fornecedor))

        <br><br>
        Fornecedor: {{ $fornecedor[$i]['nome'] }}
        <br>
        Statu: {{ $fornecedor[$i]['status'] }}
        <br>    
        CNPJ : {{ $fornecedor[$i]['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedor[$i]['ddd'] ?? ''}}) {{$fornecedor[$i]['telefone']}}

    @endwhile --}}


    {{-- @foreach($fornecedor as $i)

        <br><br>
        Fornecedor: {{ $i['nome'] }}
        <br>
        Statu: {{ $i['status'] }}
        <br>    
        CNPJ : {{ $i['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $i['ddd'] ?? ''}}) {{$i['telefone']}}

    @endforeach --}}


    @forelse($fornecedor as $i)

        {{-- @dd($loop) --}}
        
        <br><br>
        Iteração atual: {{$loop->iteration}}
        <br>
        Fornecedor: @{{ $i['nome'] }}
        <br>
        Statu: {{ $i['status'] }}
        <br>    
        CNPJ : {{ $i['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $i['ddd'] ?? ''}}) {{$i['telefone']}}
        <br>
        @if($loop->first)
            Primeira iteração do loop
        @endif 
        @if($loop->last)
            Última iteração do loop
        @endif 
        {{ $loop->count}}
        <hr>
    @empty 
        Não exitem fornecedores cadastrados!!
    @endforelse

    {{-- @empty($fornecedor[0]['cnpj'])
        - Vazio
    @endempty  --}}

    {{-- @unless($fornecedor[0]['status'] == 'S')
        Fornecedor Inativo
    @endunless --}}

@endisset