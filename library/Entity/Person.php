<?php
namespace Entity;

use Entity\Greeting;

class Person
{
    
    /**
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue(strategy="auto")
     * @var int
     */
    private $id;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $name;
    
    /**
     * @ManyToOne(targetEntity="Entity\Greeting", inversedBy="persons")
     * @var Greeting
     */
    private $greeting;
    
    public function __construct(Greeting $greeting, $name) {
        $this->setName($name);
        $this->setGreeting($greeting);
    }
    
    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = (string) $name;
    }
    
    /**
     * @return Greeting
     */
    public function getGreeting() {
        return $this->greeting;
    }
    
    /**
     * @param Greeting $greeting
     */
    public function addPerson(Greeting $greeting) {
        $this->greeting = $greeting;
    }

}