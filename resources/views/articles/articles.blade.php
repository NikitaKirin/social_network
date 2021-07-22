@extends('layouts.app')
@section('title', 'Все объявления')

@section('main')
    @include('inc.header')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Аннотация</th>
            <th scope="col">Автор</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->annotation }}</td>
                <td>{{ $article->user()->first()->name . ' ' . $article->user()->first()->surname }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
