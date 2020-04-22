<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 22.04.2020
 * Time: 21:34
 */
?>

@extends('template')

@section('title')
    Wprowadzenie wypożyczenia
    @endsection

@section('content')
    <div class="container">
        <h2>Dodawanie wypożyczeń</h2>
        <form action="{{ action('LoanController@store') }}" method="post" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="book_id">Tytuł książki</label>
                <select type="text" class="form-control" name="book_id">
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="client">Dane wypożyczającego</label>
                <input type="text" class="form-control" name="client">
            </div>
            <div class="form-group">
                <label for="loaned_on">Data wypożyczenia</label>
                <input type="text" class="form-control" name="loaned_on">
            </div>
            <div class="form-group">
                <label for="estimated_on">Przewidywany zwrot</label>
                <input type="text" class="form-control" name="estimated_on">
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary">
        </form>
    </div>
    @endsection('content')

