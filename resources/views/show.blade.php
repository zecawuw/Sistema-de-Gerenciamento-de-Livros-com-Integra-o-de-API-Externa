@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes do Livro</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $livro->titulo }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $livro->descricao }}</p>
            <p class="card-text"><strong>Autor:</strong> {{ $livro->autor }}</p>
            <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($livro->preco, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Quantidade em Estoque:</strong> {{ $livro->quantidade }}</p>
            <p class="card-text"><strong>Biografia do Autor:</strong> {{ $livro->autor_biografia }}</p>
            <p class="card-text"><strong>Nacionalidade do Autor:</strong> {{ $livro->autor_nacionalidade }}</p>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection