<?php

namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use App\Models\Livro;
   use Illuminate\Support\Facades\Http;

   class LivroController extends Controller
   {
       public function index()
       {
           return view('livros.index', ['livros' => Livro::all()]);
       }

       public function create()
       {
           return view('livros.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'titulo' => 'required',
               'autor' => 'required',
               'preco' => 'required|numeric',
               'quantidade' => 'required|integer',
           ]);

           $autorInfo = Http::get('https://openlibrary.org/search/authors.json?q=' . urlencode($request->autor));
           $autorData = $autorInfo->json();
           $autorBiografia = $autorData['docs'][0]['bio'] ?? 'Biografia não encontrada';
           $autorNacionalidade = $autorData['docs'][0]['birth_place'] ?? 'Desconhecido';

           Livro::create(array_merge($request->all(), [
               'autor_biografia' => $autorBiografia,
               'autor_nacionalidade' => $autorNacionalidade
           ]));

           return redirect()->route('livros.index');
       }

       public function show(Livro $livro)
       {
           return view('livros.show', compact('livro'));
       }

       public function edit(Livro $livro)
       {
           return view('livros.edit', compact('livro'));
       }

       public function update(Request $request, Livro $livro)
       {
           $request->validate([
               'titulo' => 'sometimes|required',
               'autor' => 'sometimes|required',
               'preco' => 'sometimes|required|numeric',
               'quantidade' => 'sometimes|required|integer',
           ]);
           
           if ($request->has('autor')) {
               $autorInfo = Http::get('https://openlibrary.org/search/authors.json?q=' . urlencode($request->autor));
               $autorData = $autorInfo->json();
               $livro->autor_biografia = $autorData['docs'][0]['bio'] ?? 'Biografia não encontrada';
               $livro->autor_nacionalidade = $autorData['docs'][0]['birth_place'] ?? 'Desconhecido';
           }

           $livro->update($request->all());
           return redirect()->route('livros.index');
       }

       public function destroy(Livro $livro)
       {
           $livro->delete();
           return redirect()->route('livros.index');
       }
   }