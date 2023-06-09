<form action={{ route('site.contato.post')}} method="post">
    @csrf
    <input type="text" placeholder="Nome" name="nome" class="{{ $estilo_borda }}">
    <br>
    <input type="text" placeholder="Telefone" name="telefone" class="{{ $estilo_borda }}">
    <br>
    <input type="text" placeholder="E-mail" name="email" class="{{ $estilo_borda }}">
    <br>
    <select name="motivo_contato"class="{{ $estilo_borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $estilo_borda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $estilo_borda }}">ENVIAR</button>
</form>