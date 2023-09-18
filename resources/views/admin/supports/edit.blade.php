<h1>Editar Dúvida: {{ $support->id }} </h1>

<form action="{{ route('supports.editAction', $support->id) }}" method="POST">
    <input type="hidden" value={{ csrf_token() }} name="_token">

    {{-- <input type="text" value="PUT" name="_method"> --}}
    @method('PUT')

    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Atualizar</button>
</form>
