<p align="center"><a href="https://laravel.com" target="_blank"><img src="http://joxi.ru/bmoMY1f7gpeXAy.jpg" width="700"></a></p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/PHP 7.4+-FF2D20?style=for-the-badge&logo=php&logoColor=white&color=777BB4" alt="PHP 7.4"></a>
<a href="#"><img src="https://img.shields.io/badge/laravel 8-%FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white&color=FF2D20" alt="Laravel 8"></a>
<a href="#"><img src="https://img.shields.io/badge/VueJS-FF2D20?style=for-the-badge&logo=vuedotjs&logoColor=white&color=4fc08d" alt="Vue and Vuex"></a>
<a href="#"><img src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white" alt="SASS"></a>
<a href="#"><img src="https://img.shields.io/badge/mysql-%4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white&color=4479A1" alt="MySQL"></a>
<a href="#"><img src="https://img.shields.io/badge/Docker%20-%232496ED.svg?&style=for-the-badge&logo=Docker&logoColor=ffffff" alt="Docker"></a>
<a href="#"><img src="https://img.shields.io/badge/Bootstrap%205%20-%232496ED.svg?&style=for-the-badge&logo=Bootstrap&logoColor=ffffff&color=724DAA" alt="Docker"></a>
</p>

## <u>О тестовом задании</u>:

Небольшой сайт — статейник. Макет отсутствует. Текст статей сгенерирован через **faker**. В качестве CSS фреймворка — **Bootstrap 5**. В качестве JavaScript фреймворка — **Vue.js + Vuex**. Без реализации хранения изображения. В качестве заглушек изображения используется сервис <a href="placeholder.com">placeholder.com</a>. Вся логика реализована встроенным функционалом **Laravel**.

### Разделы сайта:
<ul>
<li>Главная страница: <tt>URL: /</tt></li>
<li>Каталог статей: <tt>URL: /article</tt></li>
<li>Страница статьи: <tt>URL: /article/{<abbr title="Человеко понятная часть URL">slug</abbr>}</tt></li>
</ul>

#### Главная страница:
<ul>
<li>Навигационное меню с активным пунктом - <b>Главная страница</b></li>
<li>6 последних добавленных статей с миниатюрами и описанием. Сортировка <abbr title="Last In First Out - последним пришёл, первым вышел">LIFO</abbr></li>
</ul>

#### Каталог статей:
<ul>
<li>Навигационное меню с активным пунктом - <b>Каталог статей</b></li>
<li>Стандартная пагинация Laravel, по 10 статей на страницу.</li>
<li>Мини-статья:</li>
    <ul>
        <li>Превью изображения статьи</li>
        <li>Заголовок статьи</li>
        <li>Краткое описание - 100 символов.</li>
        <li>Лайки, просмотры</li>
        <li>Кликабельные теги</li>
    </ul>
</ul>

#### Страница статьи:
<ul>
    <li>Изображения статьи</li>
    <li>Заголовок статьи</li>
    <li>Теги статьи (списком)</li>
    <li>Текст статьи</li>
    <li>Интерактивный счётчик лайков</li>
    <li>Интерактивный счётчик просмотров (просмотр засчитывается спустя 5 секунд прибывания на странице)</li>
    <li>Форма комментария с валидацией</li>
    <li>Список комментариев</li>
</ul>

<hr>

### <u>API:</u>
Реализация позволяет избежать блокировки БД при большоем количестве запросов на инкрементацию счётчиков.

### <u>API методы:</u>

`GET /article-json` - Возвращает ресурс статьи, в `Request` принимает `Slug`<br>
`PUT /article-views-increment` - Инекрементирует счётчик просмотров.<br>
`PUT /article-likes-increment` - Инекрементирует счётчик лайков.<br>
`POST /article-add-comment` - Добавляет новый комментарий в очередь<br>

<hr>

## Требования
Для комфортной работы и запуска необходимо:
+ **<a href="//releases.ubuntu.com/20.04/">Ubuntu 20.04</a>**, либо Win10 и **<a href="//docs.microsoft.com/ru-ru/windows/wsl/compare-versions">WSL2** образ данной ОС (<a href="//www.microsoft.com/ru-ru/p/ubuntu-2004-lts/9n6svws3rx71?activetab=pivot:overviewtab">**Ubuntu WSL2**</a>)
+ Установленный **<a href="//www.docker.com/get-started">Docker</a>** и **<a href="//docs.docker.com/compose/">Docker-compose</a>** последней версии
+ Установленную в ОС утилиту **<a href="//www.gnu.org/software/make/manual/make.html">make</a>**: `sudo apt install make`
+ **<a href="//www.jetbrains.com/phpstorm/">PhpStorm</a>**
+ <a href="https://git-scm.com/">**Git**</a>

## Команды `make`
Для удобства в проект был добавлен `Makefile` который содержит команды сборки проекта. Команды необходимо выполняеть находясь на одном уровне с `Makefile` <br><br>
`make init`: Полностью пересобирает проект. Удаляет тома, останавливает docker, обновляет образы из хаба, собирает их и поднимает контейнеры<br>
`make up`: Поднимает контейнеры<br>
`make down`: Останавливает контейнеры с флагом `--remove-orphans`<br>
`make restart`:  Останавливает контейнеры и поднимает их заново

## Запуск проекта
1. `git clone имя_репозитория` - Сперва клонируем репозиторий, после чего переходим в папку проекта.
2. `make init` - Собираем проект.
3. `docker-compose exec app php artisan key:generate` - Генерируем ключ приложения
4. `docker-compose exec app php artisan migrate:refresh --seed` - Запускаем миграции и запускаем посев данных (в случае возникновения ошибки 1062 Duplicate entry, запустите команду ещё раз или два, пока не получите сообщение - Database seeding completed successfully. Такое случается т.к. генератор посева данных faker, ограничен в своей фантазии)
5. `docker-compose exec app composer install` - Устанавливаем PHP зависимости
6. `docker-compose exec app composer dump-autoload -o` - Загружаем классы которые должны быть добавлены в пакет /app/helpers
7. `docker-compose exec app npm install` - Ставим NPM пакеты
8. `docker-compose exec app npm run dev` - Запускаем NPM сборку
9. Добавляем в файл `/etc/hosts` или `C:\Windows\System32\drivers\etc\hosts` - 127.0.0.1 laravelapp.ru
Проект доступен по url: laravelapp.ru
