<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use sts\App;

$loader = require( __DIR__ . '/vendor/autoload.php' );
$loader->addPsr4( 'sts\\', __DIR__ . '/src/' );

/** @var App $app */
$app = App::create();
echo $app->run();