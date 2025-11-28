<div class="mb-3">
    <label>Nome</label>
    <input name="nome" class="form-control" value="{{ old('nome', $animal->nome ?? '') }}">
</div>

<div class="mb-3">
    <label>Idade</label>
    <input name="idade" type="number" class="form-control" value="{{ old('idade', $animal->idade ?? '') }}">
</div>

<div class="mb-3">
    <label>Espécie</label>
    <select name="especie" class="form-control">
        @php $e = old('especie', $animal->especie ?? '') @endphp
        <option value="Cachorro" {{ $e=='Cachorro'?'selected':'' }}>Cachorro</option>
        <option value="Gato" {{ $e=='Gato'?'selected':'' }}>Gato</option>
        <option value="Ave" {{ $e=='Ave'?'selected':'' }}>Ave</option>
    </select>
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control">

    @isset($animal)
        <img src="{{ asset('storage/'.$animal->foto) }}" width="120" class="mt-2">
    @endisset
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
