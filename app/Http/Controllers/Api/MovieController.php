<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->only([
            'nombre', 'clasificacion', 'fecha_estreno', 'resena', 'temporada'
        ]));

        return response()->json($movie, 201);
    }

    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->only([
            'nombre', 'clasificacion', 'fecha_estreno', 'resena', 'temporada'
        ]));

        return response()->json($movie);
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return response()->json(['message' => 'Movie deleted']);
    }
}

