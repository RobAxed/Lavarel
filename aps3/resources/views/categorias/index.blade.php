@extends('layouts.app')

@section('content')
<h2>Categorias</h2>

<form action="{{ route('produtos.store', [], false) }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="form-control mb-2">
    <textarea name="descricao" placeholder="Descrição" class="form-control mb-2"></textarea>
    <button class="btn btn-primary">Salvar</button>
</form>


<ul class="list-group">
@foreach($categorias as $c)
<li class="list-group-item">{{ $c->nome }}</li>
@endforeach
</ul>

@endsection
