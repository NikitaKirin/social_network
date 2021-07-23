@extends('layouts.app')

@section('title', 'Статья :: ' . $article->title)

@include('inc.header')

@section('main')
    <h2>{{ $article->title }}</h2>
    <p><i>{{ $article->annotation }}</i></p>
    <p><strong>{{ $article->text }}</strong></p>
    <p><i>Автор:</i>{{ $article->user()->first()->name . $article->user()->first()->surname }}</p>
    <a href="{{ route('article-edit-form', ['article' => $article]) }}" class="btn btn-primary">Изменить</a>
@endsection
