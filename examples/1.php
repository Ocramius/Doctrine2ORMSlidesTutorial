<?php
//examples/1.php

use Entity\Greeting;

require_once __DIR__ . '/../bootstrap.php';

//Creating our greeting
$greeting = new Greeting('Hello World!');

//Registering $greeting with the EntityManager
$em->persist($greeting);

//Flushing all changes to database
$em->flush();

echo 'OK!';