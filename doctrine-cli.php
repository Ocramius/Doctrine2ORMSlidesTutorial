<?php
use Symfony\Component\Console\Helper\HelperSet,
    Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper,
    Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper,
    \Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once __DIR__ . '/bootstrap.php';

$helperSet = new HelperSet(array(
    new EntityManagerHelper($em),
    new ConnectionHelper($em->getConnection())
));
ConsoleRunner::run($helperSet);