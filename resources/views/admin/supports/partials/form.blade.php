@csrf
<div class="form-group">
    <input type="text" class="form-control mb-2" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}">
    <textarea class="form-control mb-3" cols="30" rows="5" placeholder="Descrição" name="body">{{ $support->body ?? old('body') }}</textarea>
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
