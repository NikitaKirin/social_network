@extends('layouts.app')

@section('title', 'Статьи пользователя ::' . $user->name . ' ' . $user->surname)

@section('main')
    <h3 class="mt-3">Здесь представлены все статьи, которые создал&nbsp;
        <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name . ' ' . $user->surname }}</a>
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
        @for($i = 0; $i < count($articles); $i++)
            <tr>
                <td>
                    {{ $i+1 }}
                </td>
                <td>
                    <a href="{{ route('articles.show', ['article' => $articles[$i]->id]) }}">
                        {{ $articles[$i]->title }}
                    </a>
                </td>
                <td>
                    {{ $articles[$i]->annotation }}
                </td>
                <td>
                    {{ $articles[$i]->created_at }}
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
