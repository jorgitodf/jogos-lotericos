<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'home/list.html.twig'
            );
        }, 'home.list'
    );