@extends('layouts.app')
@section('title', 'Создать статью')

@section('main')
    @include('inc.header')
    <form method="post" action="{{ route('articles.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                   value="{{ old('title') }}">
            @error('title')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="annotation" class="form-label">Аннотация</label>
            <input type="text" class="form-control @error('annotation') is-invalid @enderror" id="annotation"
                   value="{{ old('annotation') }}" name="annotation">
            @error('annotation')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Основной текст статьи</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text"
                      rows="5" name="text">{{ old('text') }}</textarea>
            @error('text')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
