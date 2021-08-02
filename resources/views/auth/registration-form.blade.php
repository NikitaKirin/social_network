@extends('layouts.app')
@section('title', 'Зарегистрироваться')
@section('main')
    <div class="row">
        <form method="post" action="{{ route('register') }}" class="col-12 col-md-4 mt-3 m-auto">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                       name="surname"
                       value="{{ old('surname') }}">
                @error('surname')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Город</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                       value="{{ old('city') }}">
                @error('city')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Дата рождения</label>
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                       name="birthday" value="{{ old('birthday') }}">
                @error('birthday')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                       aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') @enderror" id="exampleInputPassword1"
                       name="password">
                @error('password')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
