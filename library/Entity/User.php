<?php
namespace Entity;

use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection,
    Entity\Comment,
    Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 */
class User
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
    private $login;
    
    /**
     * @ORM\OneToMany(targetEntity="Entity\Comment", mappedBy="user")
     * @var Collection
     */
    private $comments;
    
    public function __construct($login) {
        $this->comments = new ArrayCollection();
        $this->setLogin($login);
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
    public function getLogin() {
        return $this->login;
    }
    
    /**
     * @param string $login
     */
    public function setLogin($login) {
        $this->login = (string) $login;
    }
    
    /**
     * @return Collection
     */
    public function getComments() {
        return $this->comments;
    }
    
    /**
     * @param Comment $comment
     */
    public function addPerson(Comment $comment) {
        $this->comments->add($comment);
        $comment->setUser($this);
    }

}