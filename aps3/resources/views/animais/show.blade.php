@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $animal->nome }}</h1>

    <img src="{{ asset('storage/'.$animal->foto) }}" width="300">

    <p><strong>Espécie:</strong> {{ $animal->especie }}</p>
    <p><strong>Idade:</strong> {{ $animal->idade }}</p>

    <a href="{{ route('animals.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
