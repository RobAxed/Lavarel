@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Animal</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('animals.store') }}">
        @csrf

        @include('animals.form')

        <button class="btn btn-success mt-3">Salvar</button>
    </form>
</div>
@endsection
