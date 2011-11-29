<?php
//examples/3.php
require_once __DIR__ . '/../bootstrap.php';

//Finding Greeting with id = 1
$greeting = $em->find('Entity\Greeting', 1);

if($greeting) {
    echo $greeting->getContent() . PHP_EOL;
    echo 'Changing the contents of found Greeting to "Hello Test!"' . PHP_EOL;
    //Using Entity\Greeting to set a new content for the $greeting!
    $greeting->setContent('Hello Test!');
    //Flushing changes to database (triggers SQL updates)
    $em->flush();
    echo 'Now try loading 2.php again!' . PHP_EOL;
}else{
    echo 'Couldn\'t find Greeting with id=1';
}