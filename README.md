Laravel Package: подписка на каналы
===================================

Добавить в composer.json, в секцию autoload:

    "autoload": {
        "classmap": [
        ],
        "psr-4": {
           "mc00\\subscription\\": "packages/mc00/subscription/src"
        }
    },

Для отображения Twig шаблона использовался *rcrowe/TwigBridge*

Запуск миграций:

php artisan migrate --path=/packages/mc00/subscription/src/migrations

Создание пользователя и заполнение таблицы каналов.

php artisan tinker

// Создать пользователя, если его нет:

    $user = new App\User();
    $user->password = Hash::make('1');
    $user->email = 'user@mail.ru';
    $user->name = 'Username';
    $user->save();

// Создать каналы:

    $subscription = new App\Subscription();
    $subscription->name = 'channel1';
    $subscription->save();
    $subscription = new App\Subscription();
    $subscription->name = 'channel2';
    $subscription->save();
    $subscription = new App\Subscription();
    $subscription->name = 'channel3';
    $subscription->save();

Выйти из artisan: exit

Доступ по URL: /listsubs
