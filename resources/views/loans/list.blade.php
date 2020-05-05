<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 17.04.2020
 * Time: 21:42
 */
?>

@extends('layouts/app')

@section('title')
    Lista wypożyczonych książek
    @endsection

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>Tytuł książki</th>
                <th>Data wypożyczenia</th>
                <th>Data planowanego zwrotu</th>
                <th>Data zwrotu</th>
                <th>Dane klienta</th>
            </tr>
            @forelse($loansList as $loan)
                <tr>
                    <td>{{ $loan->book->name }}</td>
                    <td>{{ $loan->loaned_on }}</td>
                    <td>{{ $loan->estimated_on }}</td>
                    <td>{{ $loan->returned_on }}</td>
                    <td>{{ $loan->client }}</td>
                </tr>
                @empty
                    Brak rekordów!
                @endforelse
        </table>
    </div>
    @endsection('content')

