<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require( __DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/config.php');

$isDevMode = false;

$config = Setup::createAnnotationMetadataConfiguration(
    [
        __DIR__ . '/sts/entities/'
    ],
    $isDevMode
);

$dbParams = [
    'driver'   => $parameters['driver'],
    'user'     => $parameters['user'],
    'password' => $parameters['password'],
    'dbname'   => $parameters['dbname'],
];
$entityManager = EntityManager::create($dbParams, $config);

return ConsoleRunner::createHelperSet(
    $entityManager
);

