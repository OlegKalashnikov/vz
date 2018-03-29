<nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
    <a class="navbar-brand" href="#">КГБУЗ ГБ10</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Отчеты
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('reports.excerpt')}}">Выписки от СМО</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Анализ данных</a>
                    <a class="dropdown-item" href="#">Анализ услуг</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Количество направлений</a>
                    <a class="dropdown-item" href="#">Направления по ЛПУ</a>
                    <a class="dropdown-item" href="#">Направления по ЛПУ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Данные для Бабушкина АБ</a>
                    <a class="dropdown-item" href="#">Данные для экономистов</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('import.index')}}">Данные от страховых</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Настройки
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('services.index')}}">Список услуг</a>
                    <a class="dropdown-item" href="{{route('lpu.index')}}">Список ЛПУ</a>
                    <a class="dropdown-item" href="{{route('smo.index')}}">Список СМО</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Список пользователей</a>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Профиль
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Настройки</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Выход</a>
                </div>
            </li>
        </ul>

    </div>
</nav>