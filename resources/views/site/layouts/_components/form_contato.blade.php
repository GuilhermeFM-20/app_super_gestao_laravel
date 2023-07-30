  {{ $slot }}
  <form  action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome"  name="nome" value="{{ old('nome') }}" class="{{ $borda }}">
    @if($errors->has('nome'))
      {{$errors->first('nome')}}
    @endif
    <br>
    <input type="text" placeholder="Telefone" name="telefone" value="{{ old('telefone') }}" class="{{ $borda }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" class="{{ $borda }}">
    {{ $errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{ $borda }}">
        <option value="0">Qual o motivo do contato?</option>
        @foreach ( $motivo_contatos as $motivo_contato )
          <option value="{{ $motivo_contato->id }}" {{old('motivo_contatos_id') == $motivo_contato->id  ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>    
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="text" class="{{ $borda }}">
      @if(old('text') != '')
        {{ old('text') }}
      @else
        Preencha aqui a sua mensagem
      @endif
    </textarea>
    {{ $errors->has('text') ? $errors->first('text') : ''}}
    <br>
    <button type="submit" name="submit" class="{{ $borda }}">ENVIAR</button>
</form>

{{-- @if($errors->any())
  <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
    @foreach ($errors->all() as $erro)
        {{$erro}}
    @endforeach
  </div>
@endif --}}