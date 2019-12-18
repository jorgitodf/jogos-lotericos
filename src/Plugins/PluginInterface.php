<?php

namespace App\Plugins;


use App\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}