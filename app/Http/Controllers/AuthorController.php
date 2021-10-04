<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    private $authorRepository;

    public function __construct(AuthorRepository $repository)
    {
        $this->authorRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->authorRepository->all();

        return view('admin.pages.authors.authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.authors.author_pages.create_author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $this->authorRepository->create($request->all());

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->authorRepository->getById($id);

        return view('admin.pages.authors.author_pages.edit_author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $this->authorRepository->update($request->all(), $id);

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorRepository->delete($id);

        return redirect()->route('authors.index');
    }
}
