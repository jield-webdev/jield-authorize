<?php

declare(strict_types=1);

namespace Jield\Authorize\Service;

use Jield\Authorize\Guard\Route;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

/**
 * Factory responsible of instantiating {@see \BjyAuthorize\Guard\Route}
 */
class RouteGuardServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new Route(
            $container->get('BjyAuthorize\Config')['guards'][\BjyAuthorize\Guard\Route::class], $container
        );
    }
}
