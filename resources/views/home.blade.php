@extends('layouts.app')
@section('title', 'Моя страница')
@include('inc.header')

@section('main')
    <h4>Добро
        пожаловать, {{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->surname . ' - ' . \Illuminate\Support\Facades\Auth::id() }}</h4>
    <p>Информация о вас:</p>
    <ul>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->city }}</li>
        <li>{{ \Illuminate\Support\Facades\Auth::user()->birthday }}</li>
    </ul>
@endsection

