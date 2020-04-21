<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use Illuminate\Http\Request;
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
    public function create(Request $request, BookRepository $book)
    {
        $data = [
            "name" => "Czarny Dom",
            "year" => 2010,
            "publication_place" => "Warszawa",
            "pages" => 648,
            "price" => 59.99,
        ];

        $booksList = $book->create($data);

        $isbn = new Isbn([
            'number' => '123456799',
            'issued_by' => "Wydawca1",
            'issued_on' => "2010-01-20"
        ]);


        $book->isbn()->save($isbn);

        return redirect('books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookRepository $book, $id)
    {
        $book = $book->find($id);
        return view('books/show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRepository $book, $id)
    {
        $data = [
            "name" => "Quo Vadis",
            "year" => 2001,
            "publication_place" => "Warszawa",
            "pages" => 650,
            "price" => 59.99,
        ];

        $booksList = $book->update($data, $id);

        return redirect('books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
