<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once __DIR__ . "/vendor/autoload.php";
$isDevMode = true;
// Настройки будут браться из аннотаций, на мой взгляд, это удобнее
// Заметьте, что здесь я передаю путь до каталога, который будет содержать в себе классы сущностей, проецируемые на БД
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/lib/Doctrine/"), $isDevMode);

$parameters;//Здесь вам надо вытащить настройки подключения к БД для вашего проекта
//Здесь вам надо вытащить настройки подключения к БД для вашего проекта
$dbParams = array(
    'driver'   => $parameters['driver'],
    'user'     => $parameters['user'],
    'password' => $parameters['password'],
    'dbname'   => $parameters['dbname'],
);
$entityManager = EntityManager::create($dbParams, $config);
