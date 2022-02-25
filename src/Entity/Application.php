<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity
 */
class Application
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_APPLICATION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idApplication;

    /**
     * @var string
     *
     * @ORM\Column(name="ALIAS_APPLICATION", type="string", length=255, nullable=false)
     */
    private $aliasApplication;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_APPLICATION", type="string", length=255, nullable=false)
     */
    private $nomApplication;



    /**
     * Get the value of nomApplication
     *
     * @return  string
     */ 
    public function getNomApplication()
    {
        return $this->nomApplication;
    }

    /**
     * Set the value of nomApplication
     *
     * @param  string  $nomApplication
     *
     * @return  self
     */ 
    public function setNomApplication(string $nomApplication)
    {
        $this->nomApplication = $nomApplication;

        return $this;
    }

    /**
     * Get the value of aliasApplication
     *
     * @return  string
     */ 
    public function getAliasApplication()
    {
        return $this->aliasApplication;
    }

    /**
     * Set the value of aliasApplication
     *
     * @param  string  $aliasApplication
     *
     * @return  self
     */ 
    public function setAliasApplication(string $aliasApplication)
    {
        $this->aliasApplication = $aliasApplication;

        return $this;
    }

    /**
     * Get the value of idApplication
     *
     * @return  int
     */ 
    public function getIdApplication()
    {
        return $this->idApplication;
    }

    public function __toString()
    {
        return $this->nomApplication;
    }
}
