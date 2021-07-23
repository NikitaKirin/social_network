@extends('layouts.app')
@section('title', 'Моя страница')

@section('main')
    @include('inc.header')
    <h4>Добро
        пожаловать, {{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->surname . ' - ' . \Illuminate\Support\Facades\Auth::id() }}</h4>
    <p>Информация о вас:</p>
    <ul>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->city }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->birthday }}</li>
    </ul>
    <a class="btn btn-primary" href="{{ route('user-edit-form') }}">Изменить профиль</a>
    <a class="btn btn-primary" href="{{ route('user-articles', ['id' => \Illuminate\Support\Facades\Auth::id()]) }}">Мои
        статьи</a>
@endsection

