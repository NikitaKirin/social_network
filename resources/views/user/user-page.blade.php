@extends('layouts.app')

@section('title', $user->name . ' ' . $user->surname)

@section('main')
    <p>Пользователь: {{ $user->name . ' ' . $user->surname }}</p>
    <a class="btn btn-primary" href="{{ route('user.articles.index', ['user' => $user->id]) }}">Все
        статьи, написанные пользователем</a>

    <p style="margin-top: 10px;">Оставьте свой комментарий!</p>
    <form method="post" action="{{ route('users.comment.store', ['user_id' => $user->id]) }}">
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
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @if( isset($comments) )
            @for($i = 0; $i < count($comments); $i++)
                <tr>
                    <td>
                        {{ $i+1 }}
                    </td>
                    <td>
                        {{ $comments[$i]->text }}
                    </td>
                    <td>
                        <a href="{{ route('users.show', ['user' => $comments[$i]->author_id]) }}">
                            {{ $comments[$i]->author_name . ' ' . $comments[$i]->author_surname }}
                        </a>
                    </td>
                    <td>
                        {{ $comments[$i]->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('users.comment.edit', ['comment' => $comments[$i]]) }}" class="btn btn-success">Изменить</a>
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
