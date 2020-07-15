Laravel Package: подписка на каналы
===================================

Для отображения Twig шаблона использовался *rcrowe/TwigBridge:0.9.6*

### Скопировать содержимое в корень проекта laravel

Предполагается, что модель User существует и таблица users создана, что хотя бы один пользователь в системе существует.
Если пользователь залогинен, будет использоваться он, если нет, то последний созданный (это тест).

### Добаивть функцию в модель пользователя App/User.php

    public function subscriptions()
    {
        return $this->belongsToMany('App\Subscription');
    }

### Запустить миграции

    php artisan migrate --path=/packages/mc00/subscription/src/migrations

### Запустить seeder (заполнить таблицу каналов, на которые подписывается пользователь, сначала сбросить composer autoload)

	composer dump-autoload

    php artisan db:seed --class=SubscriptionSeeder

### Добавить в composer.json проекта в секцию *autoload\psr-4* ссылку на *mc00\subscription*

    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "mc00\\subscription\\": "packages/mc00/subscription/src"
		}
    }


#### Запустить

    composer dump-autoload

### Добавить в *config/app.php* в массив *providers* ссылку на сервис-провайдер

    'providers' => [
	    mc00\subscription\subscriptionServiceProvider::class,
	]



Можно подписывать/отписывать пользователя.

Доступ к функционалу по URL: сайт/listsubs (или сайт/public/listsubs) в зависимости от настроек.



