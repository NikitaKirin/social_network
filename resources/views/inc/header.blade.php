<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('users.index') }}">Social Network</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Моя страница</a>
                    </li>{{--
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Статьи
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                <li>
                                    <a class="dropdown-item" href="{{ route('articles.create') }}">Создать статью</a>
                                </li>
                            @endauth
                            <li>
                                <a class="dropdown-item" href="{{ route('articles.index') }}">Список всех статей</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @auth
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('user.articles.index', ['user' => \Illuminate\Support\Facades\Auth::id()] ) }}">Мои
                                        статьи</a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    @guest
                        <a class="btn btn-outline-success me-2" type="button"
                           href="{{ route('register') }}">Регистрация</a>
                        <a class="btn btn-outline-success me-2" type="button" href="{{ route('login') }}">Вход</a>
                    @endguest
                    @auth
                        <a class="btn btn-danger" type="button" href="{{ route('logout') }}">Выход</a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>
</header>
