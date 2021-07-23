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
                <td>
                    <a href="/articles/{{ $article->id }}"> {{ $article->title }}</a>
                </td>
                <td>{{ $article->annotation }}</td>
                <td>
                    <a href="{{ route('user-page', ['id' => $article->user_id]) }}">{{ $article->user()->first()->name . ' ' . $article->user()->first()->surname }} </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
