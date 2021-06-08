<?php

try {
	spl_autoload_register(function (string $className) { //автозагрузка класов.
	require_once __DIR__ . '/../src/' . $className . '.php';//подключить директория src название класа .php
	});

	$route = $_GET['route'] ?? '';//переменная роута
	$routes = require __DIR__ . '/../src/routes.php';// подключить список роутов

	$isRouteFound = false;//переменная если роут не найден
	foreach ($routes as $pattern => $controllerAndAction) {//проверить масив роутов
		preg_match($pattern, $route, $matches);// поиск совпадений pattern - шаблон того что искать, route - что мы получили, matches сюда записывается что получилось.
		if (!empty($matches)) { // если масив роутов не пустой то...
			$isRouteFound = true; // значение isRouteFound меняется на +
			break; //остановка проверки.
		}
}

	unset($matches[0]);// обнулить совпадения
  $controllerName = $controllerAndAction[0];// какой Контроллер
 	$actionName = $controllerAndAction[1];//какой роут

  $controller = new $controllerName();//создание объекта
  $controller->$actionName(...$matches);
} catch (\SellBooks\Exceptions\DbException $e) {
  	$view = new \SellBooks\View\View(__DIR__ . '/../templates/errors');
  	$view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\SellBooks\Exceptions\NotFoundException $e) {
  	$view = new \SellBooks\View\View(__DIR__ . '/../templates/errors');
  	$view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
}