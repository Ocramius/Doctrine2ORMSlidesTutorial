<?php
//examples/11.php
require_once __DIR__ . '/../bootstrap.php';

echo 'Searching all users with a comment with id > 5: ' . PHP_EOL;
$users = $em
    ->createQuery('SELECT u FROM Entity\User u JOIN u.comments c WHERE c.id > :id')
    ->setParameter('id', 5)
    ->getResult();
echo 'Found ' . count($users) . ':' . PHP_EOL;
foreach($users as $user) {
    echo '  ' . $user->getId() . ' => ' . $user->getLogin() . ' (' . get_class($user) . ')' . PHP_EOL;
}