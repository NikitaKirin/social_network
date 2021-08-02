<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="{{ route('users.index') }}">{{ config("app.name") }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">{{ __('Моя
                            страница') }}</a>
                        </li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Статьи') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('articles.create') }}">{{ __('Создать статью') }}</a>
                                </li>
                            @endauth
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('articles.index') }}">{{ __('Список всех статей') }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @auth
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('user.articles.index', ['user' => \Illuminate\Support\Facades\Auth::id()] ) }}">{{ __('Мои
                                        статьи') }}</a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    @guest
                        <a class="btn btn-outline-success me-2" type="button"
                           href="{{ route('register') }}">{{ __( 'Регистрация') }}</a>
                        <a class="btn btn-outline-success me-2" type="button"
                           href="{{ route('login') }}">{{ __( 'Вход') }}</a>
                    @endguest
                    @auth
                        <a class="btn btn-danger" type="button" href="{{ route('logout') }}">{{ __( 'Выход') }}</a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>
</header>
