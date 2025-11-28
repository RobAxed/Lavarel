@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Animal</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('animals.update', $animal) }}">
        @csrf @method('PUT')

        @include('animals.form')

        <button class="btn btn-success mt-3">Salvar alterações</button>
    </form>
</div>
@endsection
