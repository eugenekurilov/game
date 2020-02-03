<?php
namespace sts;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Class DbManager
 */
class DbManager
{
    /**
     * @param array $dbParams
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public static function getInstance(array $dbParams)
    {
        $isDevMode = true;

        $config = Setup::createAnnotationMetadataConfiguration(
            [
                __DIR__ . '/sts/entities/'
            ],
            $isDevMode, null,null,false
        );

        $config->addEntityNamespace('', 'sts\entities');

        return EntityManager::create($dbParams, $config);
    }
}
