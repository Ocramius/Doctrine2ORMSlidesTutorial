<?php
//examples/2.php
require_once __DIR__ . '/../bootstrap.php';

//Finding Greeting with id = 1
$greeting = $em->find('Entity\Greeting', 1);

if($greeting) {
    //The EntityManager has already provided us an object of type Entity\Greeting!
    echo 'Found a greeting (instance of ' . get_class($greeting)
        . ') with content ' . $greeting->getContent();
}else{
    echo 'Couldn\'t find Greeting with id=1';
}