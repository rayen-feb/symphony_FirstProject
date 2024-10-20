<?php

namespace ContainerVxliWOh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAddAuthorCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\AddAuthorCommand' shared autowired service.
     *
     * @return \App\Command\AddAuthorCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'AddAuthorCommand.php';

        $container->privates['App\\Command\\AddAuthorCommand'] = $instance = new \App\Command\AddAuthorCommand();

        $instance->setName('AddAuthorCommand');
        $instance->setDescription('Add a short description for your command');

        return $instance;
    }
}
