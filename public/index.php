<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

use Psr\Http\Message\ServerRequestInterface;
use App\Application;
use App\Plugins\RoutePlugin;
use App\Plugins\ViewPlugin;
use App\ServiceContainer;
use App\Plugins\DbPlugin;
use App\Plugins\AuthPlugin;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);


$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request) {
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});

require_once __DIR__ . '/../src/Controllers/users.php';
require_once __DIR__ . '/../src/Controllers/auth.php'; 
require_once __DIR__ . '/../src/Controllers/home.php'; 

$app->start();