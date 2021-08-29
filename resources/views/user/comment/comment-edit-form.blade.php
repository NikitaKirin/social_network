@extends('layouts.app')
@section('title', 'Изменить комментарий')
@section('main')
    <h3>Здесь вы можете изменить свой комментарий</h3>
    <form method="post" action=" {{ route('users.comment.update', ['comment' => $comment]) }} ">
        @csrf
        @method('PATCH')
        <div class="form-floating">
            <textarea class="form-control @error('text') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea" rows="3"
                      name="text">{{ $comment->text }}</textarea>
            <label for="floatingTextarea">Update comment</label>
            @error('text')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Изменить</button>
    </form>
@endsection
