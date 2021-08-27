@extends('layouts.app')
@section('title', __('Социальная сеть'))
@section('main')
    <div class="row">

        <form method="post" action="{{ route('login') }}" class="col-12 col-md-4 mt-3 m-auto">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                       aria-describedby="emailHelp" name="email" autofocus value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="exampleInputPassword1" name="password">
                @error('password')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
