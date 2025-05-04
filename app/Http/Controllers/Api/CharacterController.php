<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Movie;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::with('movies')->get();
    }

    public function store(Request $request)
    {
        $character = Character::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);

        if ($request->movie_ids) {
            $character->movies()->attach($request->movie_ids);
        }

        return response()->json($character->load('movies'), 201);
    }

    public function show($id)
    {
        return Character::with('movies')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $character->update($request->only(['nombre', 'descripcion', 'imagen']));

        if ($request->movie_ids) {
            $character->movies()->sync($request->movie_ids);
        }

        return response()->json($character->load('movies'));
    }

    public function destroy($id)
    {
        Character::destroy($id);
        return response()->json(['message' => 'Character deleted']);
    }
}
