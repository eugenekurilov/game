<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require(__DIR__ . '/config.php');

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(
    [
        __DIR__. '/src/entities/'
    ],
    $isDevMode, null,null,false
);

$config->addEntityNamespace('', 'sts\entities');

$dbParams = [
    'driver'   => $parameters['driver'],
    'user'     => $parameters['user'],
    'password' => $parameters['password'],
    'dbname'   => $parameters['dbname'],
];
/** @var EntityManager $em */
$em = EntityManager::create($dbParams, $config);
