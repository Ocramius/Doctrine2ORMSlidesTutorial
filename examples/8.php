<?php
//examples/8.php
require_once __DIR__ . '/../bootstrap.php';

//Finding previously persisted user
$user = $em->find('Entity\User', 1);

if($user) {
    echo 'Found an Entity\User: ' . PHP_EOL
        . $user->getId() . ' => ' . $user->getLogin() . '(' . get_class($user) . ')' . PHP_EOL
        . 'and ' . $user->getComments()->count() . ' Entity\Comment attached to it: ' . PHP_EOL;
    foreach($user->getComments() as $comment) {
        echo '  ' . $comment->getId() . ' => ' . $comment->getContent()
            . ' (' . get_class($comment) . ')' . PHP_EOL;
    }
} else {
    echo 'Could not find Entity\User with id=1';
}