<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return response()->json(Autor::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $autor = Autor::create([
            'nome' => $request->nome,
        ]);

        return response()->json($autor, 201);
    }

    public function show(string $id)
    {
        $autor = Autor::find($id);

        if (!$autor) {
            return response()->json([
                'mensagem' => 'Autor não encontrado.'
            ], 404);
        }

        return response()->json($autor);
    }

    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);

        if (!$autor) {
            return response()->json([
                'mensagem' => 'Autor não encontrado.'
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $autor->update([
            'nome' => $request->nome,
        ]);

        return response()->json($autor);
    }

    public function destroy(string $id)
    {
        $autor = Autor::find($id);

        if (!$autor) {
            return response()->json([
                'mensagem' => 'Autor não encontrado.'
            ], 404);
        }

        $autor->delete();

        return response()->json([
            'mensagem' => 'Autor excluído com sucesso.'
        ]);
    }
}