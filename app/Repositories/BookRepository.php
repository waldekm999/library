<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 20.04.2020
 * Time: 20:56
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Isbn;



class BookRepository extends BaseRepository
{
    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $book = Book::create($data);

        if (isset($data['author_id'])) {
            $book->authors()->sync($data['author_id']);
        }

        return $book;
    }

    public function cheapest()
    {
        $booksList = $this->model->orderBy('price', 'asc')->limit(3)->get();
        return $booksList;
    }

    public function longest()
    {
        $booksList = $this->model->orderBy('pages', 'desc')->limit(3)->get();
        return $booksList;
    }

    public function search(string $q)
    {
        $booksList = $this->model->where('name', 'like', "%".$q."%")->get();
        return $booksList;
    }
}
