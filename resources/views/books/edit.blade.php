<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 21.04.2020
 * Time: 13:04
 */
?>

@extends('template')

@section('title')
    Edycja książki
    @endsection

@section('content')
    <div class="container">
        <h2>Edycja książki</h2>
        <form action="{{ action('BookController@update',[$book->id]) }}" method="post" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="author_id[]">Autor</label>
                <select type="text" class="form-control" name="author_id[]" multiple="multiple">
                    @foreach($authors as $author)
                        @if(in_array($author->id, $book->authors->pluck('id')->toArray()))
                            <option value="{{ $author->id }}" selected>{{ $author->lastname }} {{$author->firstname}}</option>
                        @else
                            <option value="{{ $author->id }}">{{ $author->lastname }} {{ $author->firstname }}</option>
                        @endif
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Tytuł książki</label>
                <input type="text" class="form-control" name="name" value="{{ $book->name }}" />
            </div>
            <div class="form-group">
                <label for="year">Rok publikacji</label>
                <input type="text" class="form-control" name="year" value="{{ $book->year }}" />
            </div>
            <div class="form-group">
                <label for="publication_place">Miejsce wydania</label>
                <input type="text" class="form-control" name="publication_place" value="{{ $book->publication_place }}" />
            </div>
            <div class="form-group">
                <label for="pages">Liczba stron</label>
                <input type="text" class="form-control" name="pages" value="{{ $book->pages }}" />
            </div>
            <div class="form-group">
                <label for="price">Cena</label>
                <input type="text" class="form-control" name="price" value="{{ $book->price }}" />
            </div>

            <input type="submit" value="Aktualizuj" class="btn btn-primary" />
        </form>
    </div>
    @endsection('content')
