<?php
//examples/5.php
require_once __DIR__ . '/../bootstrap.php';

//Creating a DQL query that selects all greetings with id >= 5 and id <= 10
$greetings = $em
    ->createQuery('SELECT g FROM Entity\Greeting g WHERE g.id >= 5 AND g.id <= 10')
    ->getResult();

//Displaying results
echo 'Found ' . count($greetings) . ' Entity\Greeting:' . PHP_EOL;
foreach($greetings as $greeting) {
    echo ' - ' . $greeting->getId() . ' => ' . $greeting->getContent() . PHP_EOL;
}