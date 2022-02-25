<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application_utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationUserRepository")
 */
class ApplicationUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

   /**
    * @var Utilisateur
    *
    * @ORM\ManyToOne(targetEntity="Utilisateur")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="ID_UTILISATEUR")
    * })
    */
    private $user;

    /**
    * @var Application
    *
    * @ORM\ManyToOne(targetEntity="Application")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="id_application", referencedColumnName="ID_APPLICATION")
    * })
    */
    private $application;




    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of user
     *
     * @return  Utilisateur
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param  Utilisateur  $user
     *
     * @return  self
     */ 
    public function setUser(Utilisateur $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of application
     *
     * @return  Application
     */ 
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set the value of application
     *
     * @param  Application  $application
     *
     * @return  self
     */ 
    public function setApplication(Application $application)
    {
        $this->application = $application;

        return $this;
    }
}
