<?php
//examples/10.php
require_once __DIR__ . '/../bootstrap.php';

$user = $em->find('Entity\User', 1);

if($user) {
    echo 'Found an Entity\User: ' . PHP_EOL
        . $user->getId() . ' => ' . $user->getLogin() . '(' . get_class($user) . ')' . PHP_EOL
        . 'and ' . $user->getComments()->count() . ' Entity\Comment attached to it: ' . PHP_EOL;
    if($comment = $user->getComments()->first()) {
        echo 'Removing the first attached comment!' . PHP_EOL;
        echo 'Removing comment with id=' . $comment->getId() . PHP_EOL;
        $em->remove($comment);
        $em->flush();
    } else {
        echo 'Could not find any comments to remove...' . PHP_EOL;
    }
} else {
    echo 'Could not find Entity\User with id=1';
}