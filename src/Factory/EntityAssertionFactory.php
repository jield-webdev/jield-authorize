<?php

declare(strict_types=1);

namespace Jield\Authorize\Factory;

use Psr\Container\ContainerInterface;
use Jield\Authorize\Permissions\Acl\Assertion\AbstractAssertion;
use Laminas\ServiceManager\Factory\FactoryInterface;

final class EntityAssertionFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ): AbstractAssertion {
        return new $requestedName($container);
    }
}
