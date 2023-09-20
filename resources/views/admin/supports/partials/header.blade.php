<div class="d-flex align-items-center mt-2">
    <div class="d-flex col align-items-center">
        <h4>Fórum</h4>
        <span class="custom_doubt"> {{$total}} Dúvidas</span>
    </div>
    <div class="col d-flex justify-content-end btn">
        <a href="{{route('supports.create')}}">Criar assunto</a>
    </div>
</div>

<div class="input-group rounded my-2">
    <div class="form-outline w-auto">
        <form action="{{ route('supports.index') }}" method="GET">
            <input name="filter" type="text" class="form-control" value="{{$filter['filter'] ?? ''}}" placeholder="Procurar"/>
        </form>
    </div>
</div>

