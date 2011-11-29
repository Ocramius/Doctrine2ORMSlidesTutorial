<?php
namespace Entity;

use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection,
    Entity\Person;

class Greeting
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
    private $content;
    
    /**
     * @OneToMany(targetEntity="Entity\Person", mappedBy="greeting")
     * @var Collection
     */
    private $persons;
    
    public function __construct($content) {
        $this->persons = new ArrayCollection();
        $this->setContent($content);
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
    public function getContent() {
        return $this->content;
    }
    
    /**
     * @param string $content
     */
    public function setContent($content) {
        $this->content = (string) $content;
    }
    
    /**
     * @return Collection
     */
    public function getPersons() {
        return $this->persons;
    }
    
    /**
     * @param Person $person
     */
    public function addPerson(Person $person) {
        $this->persons->add($person);
        $person->setGreeting($this);
    }

}