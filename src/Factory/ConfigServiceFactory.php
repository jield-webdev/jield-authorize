<?php

declare(strict_types=1);

namespace Jield\Authorize\Factory;

use BjyAuthorize\Provider\Role\ObjectRepositoryProvider;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ConfigServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = $container->get('config');

        $bjyAuthorizeConfig   = $config['bjyauthorize'];
        $jieldAuthorizeConfig = $config['jield_authorize'];

        //Inject the role_provider
        $bjyAuthorizeConfig['role_providers'] = [
            ObjectRepositoryProvider::class => [
                'object_manager'    => EntityManager::class,
                'role_entity_class' => $jieldAuthorizeConfig['role_entity_class'],
            ],
        ];

        //Override the cache_enabled
        $bjyAuthorizeConfig['cache_enabled'] = $jieldAuthorizeConfig['cache_enabled'];

        //Override the default role
        $bjyAuthorizeConfig['default_role'] = $jieldAuthorizeConfig['default_role'];

        $bjyAuthorizeConfig['cache_key'] = 'jield-authorize-cache';

        //Override the authenticated role
        $bjyAuthorizeConfig['authenticated_role'] = $jieldAuthorizeConfig['authenticated_role'];

        return $bjyAuthorizeConfig;
    }
}
