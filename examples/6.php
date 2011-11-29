<?php
//examples/6.php
require_once __DIR__ . '/../bootstrap.php';

//Finding the last inserted greeting
$greetings = $em
    ->createQuery('SELECT g FROM Entity\Greeting g ORDER BY g.id DESC')
    ->setMaxResults(1) //we want only one result
    ->getResult();

if(!empty($greetings)) {
    $greeting = reset($greetings);
    echo 'Found greeting with id "' . $greeting->getId()
        . '" and content "' . $greeting->getContent() . '"' . PHP_EOL;
    $em->remove($greeting);
    //Triggers delete
    $em->flush();
    echo 'Greeting deleted!' . PHP_EOL;
} else {
    echo 'Could not find any Greeting' . PHP_EOL;
}