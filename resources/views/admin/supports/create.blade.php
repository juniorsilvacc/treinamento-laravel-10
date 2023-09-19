<h1>Criar Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('supports.createAction') }}" method="POST">
    @include('admin.supports.partials.form')
</form>
