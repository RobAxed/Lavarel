@extends('layouts.app')

@section('content')
<h2>Produtos</h2>

<form action="{{ route('categorias.store', [], false) }}" method="POST">
@csrf
<input type="text" name="nome" placeholder="Nome" class="form-control mb-2">
<textarea name="descricao" placeholder="Descrição" class="form-control mb-2"></textarea>
<input type="number" step="0.01" name="preco" placeholder="Preço" class="form-control mb-2">

<select name="categoria_id" class="form-control mb-2">
<option value="">Sem categoria</option>
@foreach($categorias as $cat)
<option value="{{ $cat->id }}">{{ $cat->nome }}</option>
@endforeach
</select>

<button class="btn btn-primary">Salvar</button>
</form>

<ul class="list-group">
@foreach($produtos as $p)
<li class="list-group-item">
{{ $p->nome }} - R$ {{ $p->preco }} 
@if($p->categoria)
 ({{ $p->categoria->nome }})
@endif
</li>
@endforeach
</ul>

@endsection
