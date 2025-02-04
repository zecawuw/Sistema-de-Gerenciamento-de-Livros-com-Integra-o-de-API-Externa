@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Livro</h1>
    <form action="{{ route('livros.update', $livro) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $livro->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ $livro->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ $livro->autor }}" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="{{ $livro->preco }}" required>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade em Estoque</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ $livro->quantidade }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection