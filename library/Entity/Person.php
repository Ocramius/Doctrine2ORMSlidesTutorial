<?php
namespace Entity;

use Entity\Greeting,
    Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 */
class Person
{
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Greeting", inversedBy="persons")
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