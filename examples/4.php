<?php
//examples/4.php
require_once __DIR__ . '/../bootstrap.php';

//A repository is like a "Table" containing our entities of a specified type
$repository = $em->getRepository('Entity\Greeting');

//Finding all Entity\Greeting with content = "Hello World!"
$worldGreetings = $repository->findBy(array('content' => 'Hello World!'));

//Finding all Entity\Greeting with content = "Hello Test!"
$testGreetings = $repository->findBy(array('content' => 'Hello Test!'));

//Displaying results
echo 'Found ' . count($worldGreetings) . ' "Hello World!" greetings:' . PHP_EOL;
foreach($worldGreetings as $worldGreeting) {
    echo ' - ' . $worldGreeting->getId() . PHP_EOL;
}

echo 'Found ' . count($testGreetings) . ' "Hello Test!" greetings:' . PHP_EOL;
foreach($testGreetings as $testGreeting) {
    echo ' - ' . $testGreeting->getId() . PHP_EOL;
}