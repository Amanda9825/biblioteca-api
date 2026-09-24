<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        return response()->json(
            Livro::with(['autor', 'categoria'])->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:livros,isbn',
            'autor_id' => 'required|exists:autors,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'isbn' => $request->isbn,
            'autor_id' => $request->autor_id,
            'categoria_id' => $request->categoria_id,
        ]);

        $livro->load(['autor', 'categoria']);

        return response()->json($livro, 201);
    }

    public function show(string $id)
    {
        $livro = Livro::with(['autor', 'categoria'])->find($id);

        if (!$livro) {
            return response()->json([
                'mensagem' => 'Livro não encontrado.'
            ], 404);
        }

        return response()->json($livro);
    }

    public function update(Request $request, string $id)
    {
        $livro = Livro::find($id);

        if (!$livro) {
            return response()->json([
                'mensagem' => 'Livro não encontrado.'
            ], 404);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:livros,isbn,' . $id,
            'autor_id' => 'required|exists:autors,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro->update([
            'titulo' => $request->titulo,
            'isbn' => $request->isbn,
            'autor_id' => $request->autor_id,
            'categoria_id' => $request->categoria_id,
        ]);

        $livro->load(['autor', 'categoria']);

        return response()->json($livro);
    }

    public function destroy(string $id)
    {
        $livro = Livro::find($id);

        if (!$livro) {
            return response()->json([
                'mensagem' => 'Livro não encontrado.'
            ], 404);
        }

        $livro->delete();

        return response()->json([
            'mensagem' => 'Livro excluído com sucesso.'
        ]);
    }
}