<h1>Criar Nova Dúvida</h1>

<form action="{{ route('supports.createAction') }}" method="POST">
    <input type="hidden" value={{ csrf_token() }} name="_token">
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>
