@extends('layouts.app')
@section('title', 'Изменить данные своего профиля')
@section('main')
    @include('inc.header')
    <form method="post" action="{{ route('user-update') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   value="{{ $user->name }}">
            @error('name')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                   value="{{ $user->surname }}">
            @error('surname')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Город</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                   value="{{ $user->city }}">
            @error('city')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Дата рождения</label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                   name="birthday" value="{{ $user->birthday }}">
            @error('birthday')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
