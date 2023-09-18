<h1>Listagem dos suportes</h1>
<a href="{{route('supports.create')}}">Criar assunto</a>
<table>
    <thead>
        <th>#</th>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{$support->id}}</td>
                <td>{{$support->subject}}</td>
                <td>{{$support->status}}</td>
                <td>{{$support->body}}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">Detalhes</a>
                    <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                    {{-- <a href="{{ route('supports.deleteAction', $support->id) }}">Excluir</a> --}}
                    <form action="{{ route('supports.deleteAction', $support->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

