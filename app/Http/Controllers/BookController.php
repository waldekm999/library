<?php

namespace App\Http\Controllers;

use App\Events\BookCreated;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Services\OpenLibrary;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;
use Illuminate\Support\Facades\DB;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookRepository $book)
    {
        $booksList = $book->getAll();

        return view('books/list', [
           'booksList' => $booksList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookRepository $book)
    {
        \App::setLocale(session('locale'));
        $authors = Author::all();
        return view('books/create', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request, Book $book)
    {
        $data = $request->all();
        $bookList = $book->create($data);
        //event(new BookCreated($book));

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OpenLibrary $ol, BookRepository $bookRepository, $id)
    {
        $book = $bookRepository->find($id);
        $openLibraryData = $ol->search($book->name);
        return view('books/show', [
            'book' => $book,
            'ol' => json_decode($openLibraryData)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRepository $bookRepository, $id)
    {
        $book = $bookRepository->find($id);
        $authors = Author::all();
        return view('books/edit', [
            'book' => $book,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request,BookRepository $bookRepository, $id)
    {
        $data = $request->all();
        $booksList = $bookRepository->update($data, $id);

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRepository $book, $id)
    {
        $booksList = $book->delete($id);
        return redirect('books');
    }

    public function cheapest(BookRepository $book)
    {
        $booksList = $book->cheapest();

        return view('books/list', [
           'booksList' => $booksList
        ]);
    }

    public function longest(BookRepository $book)
    {
        $booksList = $book->longest();

        return view('books/list', [
           'booksList' => $booksList
        ]);
    }

    public function search(Request $request, BookRepository $book)
    {
       $q = $request->input('q',"");
       $booksList = $book->search($q);

       return view('books/list', [
          'booksList' => $booksList
       ]);
    }
}
