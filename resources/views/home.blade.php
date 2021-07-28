@extends('layouts.app')
@section('title', 'Моя страница')

@section('main')
    @include('inc.header')
    <h4>Добро
        пожаловать, {{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->surname }}</h4>
    <p>Информация о вас:</p>
    <ul>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->city }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->birthday }}</li>
    </ul>
    <a class="btn btn-primary" href="{{ route('users.edit') }}">Изменить профиль</a>
    <a class="btn btn-primary" href="{{ route('user.articles.index', ['user' => \Illuminate\Support\Facades\Auth::id()]) }}">Мои
        статьи</a>

    <p style="margin-top: 10px;">Оставьте свой комментарий!</p>
    <form method="post" action="{{ route('user-comment-store', ['user_id' => Auth::id()]) }}">
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
                        <a href="{{ route('users.show', ['user' => $comments[$i]->author_id]) }}">
                            {{ $comments[$i]->author_name . ' ' . $comments[$i]->author_surname }}
                        </a>
                    </td>
                    <td>
                        {{ $comments[$i]->created_at }}
                    </td>
                </tr>
            @endfor
        @endif
        </tbody>
    </table>
    @if(!isset($comments))
        <p>Пока что комментариев нет :(</p>
        <p>Будьте первыми, кто оставит свой след!</p>
    @endif
@endsection

