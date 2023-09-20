<div class="table-responsive-sm">
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Assunto</th>
            <th scope="col">Status</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ações</th>
        </thead>
        <tbody>
            @foreach ($supports->items() as $support)
                <tr>
                    <td>{{ $support->id }}</td>
                    <td>{{ $support->subject }}</td>
                    <td>
                        <x-status-support :status="$support->status"></x-status-support>
                    </td>
                    <td>{{ $support->body }}</td>
                    <td>
                        <a href="{{ route('supports.show', $support->id) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



