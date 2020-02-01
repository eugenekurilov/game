<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require(__DIR__ . '/config.php');

$isDevMode = false;

$config = Setup::createAnnotationMetadataConfiguration(
    [
        __DIR__."/src/entities/"
    ],
    $isDevMode
);

$dbParams = [
    'driver'   => $parameters['driver'],
    'user'     => $parameters['user'],
    'password' => $parameters['password'],
    'dbname'   => $parameters['dbname'],
];
/** @var EntityManager $em */
$em = EntityManager::create($dbParams, $config);
