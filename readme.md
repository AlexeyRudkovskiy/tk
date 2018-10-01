## Установка

### Зависимости

* PHP >= 7.0.0
* MySQL >= 5.7.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Imagick PHP Extension

### Команды

```bash
composer install
php artisan key:generate
php artisan storage:link
```

### Пути

На веб сервере в качестве корневого пути необходимо указывать путь к папке ``public``.
Папке ``storage`` должна быть доступна на запись.

## Настройка

Указать данные базы данных в файле .env:
```ini
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Выполнить команду для создания администратора:
```bash
php artisan admin:create
```

### Внешний вид

Для постройки необходимо выполнить комманду:
```bash
npm install
```

Далее, в зависимости от среды выполнения (development или production) выполнить комманду:
```bash
npm build
npm build:prod
```

Первая комманда выполнит построение для development среды. Вторая - для production.
Для выполенния этих команд требуется утилита npx, которая поставляется вместе с nodejs
последних версий.

Результат сборки будет в папке ``public``. Стили находятся в файле
``public/frontend.style.css``. Скрипты - ``public/index.bundle.js``

Исходные коды находятся в папках ``resources/assets/scss`` и ``resources/assets/typescript``
соответственно.

