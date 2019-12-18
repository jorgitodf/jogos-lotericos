<?php
declare(strict_types=1);

namespace App\Plugins;

use Interop\Container\ContainerInterface;
use App\Auth\Auth;
use App\Auth\JasnyAuth;
use App\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('jasny.auth', function (ContainerInterface $container) {
            return new JasnyAuth($container->get('user.repository'));
        });
        $container->addLazy('auth', function (ContainerInterface $container) {
            return new Auth($container->get('jasny.auth'));
        });
    }
}