<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$loader = require( __DIR__ . '/vendor/autoload.php' );
$loader->addPsr4( 'sts\\', __DIR__ . '/sts/');

$em = \sts\DbManager::getInstance(
    require(__DIR__ . '/configs/config-test.php')
);

return ConsoleRunner::createHelperSet(
    $em
);

