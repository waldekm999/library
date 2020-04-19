<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $booksList = $book->all();

        return view('books/list', [
           'booksList' => $booksList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $book = new Book();
        $book->name = "Czarny Dom";
        $book->year = 2010;
        $book->publication_place = "Warszawa";
        $book->pages = 648;
        $book->price = 59.99;
        $book->save();

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
    public function show($id)
    {
        $book = Book::find($id);
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
    public function edit($id)
    {
        $book = Book::find($id);

        $book->name = "Quo Vadis";
        $book->year = 2001;
        $book->publication_place = "Warszawa";
        $book->pages = 650;
        $book->price = 59.99;
        $book->save();

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
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('books');
    }

    public function cheapest(Book $book)
    {
        $booksList = DB::table('books')->orderBy('price', 'asc')->limit(3)->get();
        return view('books/list', [
           'booksList' => $booksList
        ]);
    }

    public function longest(Book $book)
    {
        $booksList = DB::table('books')->orderBy('pages', 'desc')->limit(3)->get();
        return view('books/list', [
           'booksList' => $booksList
        ]);
    }
}
