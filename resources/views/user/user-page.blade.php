@extends('layouts.app')

@section('title', $user->name . ' ' . $user->surname)

@section('main')
    @include('inc.header')
    <p>Пользователь: {{ $user->name . ' ' . $user->surname }}</p>
@endsection
