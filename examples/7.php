<?php
//examples/7.php
use Entity\User,
    Entity\Comment;

require_once __DIR__ . '/../bootstrap.php';

//Creating our user
$user = new User('Marco Pivetta');
$em->persist($user);

$comment = new Comment('This is a sample post!');
$em->persist($comment);

$user->addComment($comment);

//Flushing all changes to database
$em->flush();

echo 'OK!';