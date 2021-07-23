@extends('layouts.app')

@section('title', 'Статьи пользователя ::' . $user->name . ' ' . $user->surname)

@section('main')
    @include('inc.header')
    <h3>Здесь представлены все статьи, которые создал&nbsp;
        <a href="{{ route('user-page', ['id' => $user->id]) }}">{{ $user->name . ' ' . $user->surname }}</a>
    </h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Аннотация</th>
            <th scope="col">Дата публикации</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            {{ $i = 1 }}
            <tr>
                <td>
                    {{ $i }}
                </td>
                <td>
                    <a href="{{ route('article', ['id' => $article->id]) }}">
                        {{ $article->title }}
                    </a>
                </td>
                <td>
                    {{ $article->annotation }}
                </td>
                <td>
                    {{ $article->created_at }}
                </td>
            </tr>
            {{ $i = $i + 1 }}
        @endforeach
        </tbody>
    </table>
@endsection
