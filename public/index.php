<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Подключаем автозагрузчик Composer
require __DIR__.'/../vendor/autoload.php';

// Загружаем приложение
$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var Kernel $kernel */
$kernel = $app->make(Kernel::class);

// 17. Захватываем текущий HTTP-запрос
$request = Request::capture();

// 20. Обрабатываем запрос через Kernel
$response = $kernel->handle($request);

// 23. Отправляем HTTP-ответ пользователю
$response->send();

// 26. Завершаем обработку запроса (для middleware terminate)
$kernel->terminate($request, $response);
