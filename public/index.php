<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

date_default_timezone_set('America/Sao_Paulo');

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

require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';
require_once __DIR__ . '/../src/controllers/home.php';
require_once __DIR__ . '/../src/controllers/lotofacil.php';
$app->start();