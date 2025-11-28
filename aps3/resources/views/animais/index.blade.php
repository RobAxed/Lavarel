@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Lista de Animais</h1>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-3">
            <input name="search" class="form-control" placeholder="Buscar por nome..." value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="especie" class="form-control">
                <option value="">Todas espécies</option>
                <option value="Cachorro" {{ ($especie=='Cachorro')?'selected':'' }}>Cachorro</option>
                <option value="Gato" {{ ($especie=='Gato')?'selected':'' }}>Gato</option>
                <option value="Ave" {{ ($especie=='Ave')?'selected':'' }}>Ave</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary">Filtrar</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('animals.index') }}" class="btn btn-secondary">Limpar</a>
        </div>

        <div class="col-md-2 text-end">
            <a href="{{ route('animals.create') }}" class="btn btn-success">Novo Animal</a>
        </div>
    </form>

    <div class="row">
        @foreach($animais as $animal)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/'.$animal->foto) }}" class="card-img-top" height="200">
                    <div class="card-body">
                        <h5>{{ $animal->nome }}</h5>
                        <p>{{ $animal->especie }} • {{ $animal->idade }} anos</p>

                        <a href="{{ route('animals.show', $animal) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $animais->links() }}
</div>
@endsection
