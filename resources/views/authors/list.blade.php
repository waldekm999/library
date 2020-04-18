<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 18.04.2020
 * Time: 21:29
 */
?>

@extends('template')

@section('title')
    Lista autorów
    @endsection

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>Nazwisko autora</th>
                <th>Imię autora</th>
                <th>Data urodzenia</th>
                <th>Gatunki</th>
                <th>Książki</th>
            </tr>
            @forelse($authorsList as $author)
                <tr>
                <td>{{ $author->lastname }}</td>
                <td>{{ $author->firstname }}</td>
                <td>{{ $author->birthday }}</td>
                <td>{{ $author->genres }}</td>
                <td>
                    @foreach($author->books as $book)
                        <a href="{{ url('/books', [$book->id]) }}">{{ $book->name }}</a>
                        @endforeach
                </td>
                </tr>
                @empty
                    Brak rekordów!
                @endforelse
        </table>
    </div>
    @endsection('content')
