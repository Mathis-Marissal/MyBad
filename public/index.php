<?php 

require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Controllers/PageController.php';
require_once __DIR__ . '/../app/Controllers/Api/ExcuseApiController.php';

$router = new Router();

$router->add('GET', '/', 'PageController', 'home');
$router->add('GET', '/excuses/all', 'PageController', 'all');
$router->add('GET', '/add', 'PageController', 'add');

$router->add('GET', '/api/excuses', 'ExcuseApiController', 'list');
$router->add('GET', '/api/excuses/random', 'ExcuseApiController', 'random');
$router->add('POST', '/api/excuses', 'ExcuseApiController', 'store');

$router->dispatch();