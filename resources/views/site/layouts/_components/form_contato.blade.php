  <form  action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome"  name="nome" value="{{ old('nome') }}" class="{{ $borda }}">
    <br>
    <input type="text" placeholder="Telefone" name="telefone" value="{{ old('telefone') }}" class="{{ $borda }}">
    <br>
    <input type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" class="{{ $borda }}">
    <br>
    <select name="motivo_contato" class="{{ $borda }}">
        <option value="0">Qual o motivo do contato?</option>
        @foreach ( $motivo_contatos as $motivo_contato )
          <option value="{{ $motivo_contato->id }}" {{old('motivo_contato') == $motivo_contato->id  ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>    
        @endforeach
    </select>
    <br>
    <textarea name="text" class="{{ $borda }}">
      @if(old('text') != '')
        {{ old('text') }}
      @else
        Preencha aqui a sua mensagem
      @endif
    </textarea>
    <br>
    <button type="submit" name="submit" class="{{ $borda }}">ENVIAR</button>
</form>