  <form  action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome"  name="nome"" class="{{ $borda }}">
    <br>
    <input type="text" placeholder="Telefone" name="telefone" class="{{ $borda }}">
    <br>
    <input type="text" placeholder="E-mail" name="email" class="{{ $borda }}">
    <br>
    <select name="motivo" class="{{ $borda }}">
        <option value="0">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" name="submit" class="{{ $borda }}">ENVIAR</button>
</form>