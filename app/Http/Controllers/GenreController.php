<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Repositories\GenreRepository;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genreRepository;

    /**
     * GenreController constructor.
     *
     * @param GenreRepository $repository
     */
    public function __construct(GenreRepository $repository)
    {
        $this->genreRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = $this->genreRepository->all();

        return view('admin.pages.genres.genres', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.genres.genre_pages.create_genre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $this->genreRepository->create($request->all());

        return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = $this->genreRepository->getById($id);

        return view('admin.pages.genres.genre_pages.edit_genre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GenreRequest  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $this->genreRepository->update($request->all(), $id);

        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->genreRepository->delete($id);

        return redirect()->route('genres.index');
    }
}
