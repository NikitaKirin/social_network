@extends('layouts.app')
@section('title', 'Все объявления')

@section('main')
    <table class="table table-hover mt-3">
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
                    <a href="{{ route('users.show', ['user' => $article->user_id]) }}">{{ $article->user()->first()->name . ' ' . $article->user()->first()->surname }} </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
