<?php

use DI\Container;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

// Instanciez le conteneur de dépendances
$container = new Container();

// Configurer les dépendances

// Configuration d'une dépendance pour la classe Post
$container->set('Post', function (ContainerInterface $container) {
    $db = $container->get('db');
    return new Article($db);
});

// Retournez le conteneur
return $container;
?>