<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy('genre', 'asc')->paginate(25);
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.genre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'genre' => 'required|max:255',
        ]);

        Genre::create($validated);

        return redirect('genres.index', 201)
            ->with('success', 'Gênero criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genre.genre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'genre' => 'required',
        ]);

        $genre->fill($request->post())->save();

        return redirect()
            ->route('genres.edit', $genre->id)
            ->with('success', 'Gênero atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()
            ->route('genres.index')
            ->with('success', 'Gênero deletado com sucesso.');
    }
}
