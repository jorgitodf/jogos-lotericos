<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/lotofacil', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'lotofacil/index.html.twig', ['title' => 'Lotofácil']
            );
        }, 'lotofacil.index'
    )
    ->get('/lotofacil/new', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'lotofacil/create.html.twig', ['title' => 'Novo Concurso Lotofácil']
            );
        }, 'lotofacil.new'
    );