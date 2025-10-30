@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="mb-4">Painel</h2>

    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
        <a href="{{ route('categorias.index', [], false) }}" class="btn btn-lg btn-primary px-4">
            Categorias
        </a>

        <a href="{{ route('produtos.index', [], false) }}" class="btn btn-lg btn-secondary px-4">
            Produtos
        </a>
    </div>
</div>
@endsection