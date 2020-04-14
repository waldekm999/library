<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 14.04.2020
 * Time: 20:37
 */
?>

@extends('template')

@section('title')
    Lista książek
@endsection

@section('content')
    <div class="container">
       @forelse($booksList as $book)
           Tu będą dane książki!
        @empty
            Brak rekordów!
        @endforelse
    </div>
@endsection('content')
