@extends('layouts.app')

@section('title', 'Статья :: ' . $article->title)

@include('inc.header')

@section('main')
    <h2>{{ $article->title }}</h2>
    <p><i>{{ $article->annotation }}</i></p>
    <p><strong>{{ $article->text }}</strong></p>
    <p><i>Автор: </i>
        <a href="{{ route('users.index', ['user' => $article->user_id]) }}">
            {{ $article->user()->first()->name . ' ' . $article->user()->first()->surname }}
        </a>
    </p>
    <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-primary">Изменить</a>

    <p style="margin-top: 10px;">Оставьте свой комментарий!</p>
    <form method="post" action="{{ route('articles.comments.store', ['article' => $article]) }}">
        @csrf
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" rows="3"
                      name="text"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Отправить</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текст комментария</th>
            <th scope="col">Автор</th>
            <th scope="col">Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($comments))
            @for($i = 0; $i < count($comments); $i++)
                <tr>
                    <td>
                        {{ $i+1 }}
                    </td>
                    <td>
                        {{ $comments[$i]->text }}
                    </td>
                    <td>
                        <a href="{{ route('users.index', ['user' => $comments[$i]->user_id]) }}">
                            {{ $comments[$i]->author_name . ' ' . $comments[$i]->author_surname }}
                        </a>
                    </td>
                    <td>
                        {{ $comments[$i]->created_at }}
                    </td>
                </tr>
            @endfor
        @else
            <p>Пока что комментариев нет :(</p>
            <p>Будьте первыми, кто оставит свой след!</p>
        @endif
        </tbody>
    </table>
@endsection
