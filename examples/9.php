<?php
//examples/9.php
use Entity\Comment;

require_once __DIR__ . '/../bootstrap.php';

$user = $em->find('Entity\User', 1);

if($user) {
    echo 'Found an Entity\User: ' . PHP_EOL
        . $user->getId() . ' => ' . $user->getLogin() . '(' . get_class($user) . ')' . PHP_EOL
        . 'and ' . $user->getComments()->count() . ' Entity\Comment attached to it: ' . PHP_EOL;
    echo 'Adding a Comment to the user';
    $comment = new Comment('Comment generated at ' . time());
    $em->persist($comment);
    $user->addComment($comment);
    $em->flush();
    echo 'Comment has been attached to the user, try 8.php!';
} else {
    echo 'Could not find Entity\User with id=1';
}