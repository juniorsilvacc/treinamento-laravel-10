<div>
    <ul class="list-group">
        <li class="list-group-item">Id: {{$support->id}}</li>
        <li class="list-group-item">Assunto: {{$support->subject}}</li>
        <li class="list-group-item">Status: {{$support->status}}</li>
        <li class="list-group-item">Descrição: {{$support->body}}</li>
    </ul>

    <form action="{{ route('supports.deleteAction', $support->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn bg-danger mt-2">Excluir</button>
    </form>
</div>
