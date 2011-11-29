<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache;

//autoloading
require_once 'library/doctrine-orm/lib/Doctrine/ORM/Tools/Setup.php';
Setup::registerAutoloadGit(__DIR__ . '/library/doctrine-orm');

//configuration
$config = new Configuration();
$cache = new Cache();
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/library/EntityProxy');
$config->setProxyNamespace('EntityProxy');
$config->setAutoGenerateProxyClasses(true);

//mapping (example uses annotations, could be any of XML/YAML or plain PHP)
$driverImpl = $config->newDefaultAnnotationDriver(__DIR__ . '/library/Entity');
$config->setMetadataDriverImpl($driverImpl);
$config->setMetadataCacheImpl($cache);

//getting the EntityManager
$em = EntityManager::create(
    array(
        'driver' => 'pdo_sqlite',
        'path' => 'database.sqlite'
    ),
    $config
);