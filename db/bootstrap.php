<?php
use App\Application;
use App\Plugins\AuthPlugin;
use App\Plugins\DbPlugin;
use App\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());
return $app;