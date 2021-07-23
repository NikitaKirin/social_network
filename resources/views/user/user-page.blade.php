@extends('layouts.app')

@section('title', $user->name . ' ' . $user->surname)

@section('main')
    @include('inc.header')
    <p>Пользователь: {{ $user->name . ' ' . $user->surname }}</p>
    <a class="btn btn-primary" href="{{ route('user-articles', ['id' => $user->id]) }}">Все
        статьи, написанные пользователем</a>
@endsection
