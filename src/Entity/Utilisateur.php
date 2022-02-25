<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_UTILISATEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="ctremoteuser", type="string", length=255, nullable=false)
     */
    private $ctremoteuser;

    /**
     * @var string
     * 
     * @ORM\Column(name="ctln", type="string", length=255, nullable=false)
     */
    private $ctln;

    /**
     * @var string
     *
     * @ORM\Column(name="ctfn", type="string", length=255, nullable=false)
     */
    private $ctfn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FrEduRneResp", type="text", length=65535, nullable=true)
     */
    private $fredurneresp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FrEduResDel", type="text", length=65535, nullable=true)
     */
    private $freduresdel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FrEduFonctAdm", type="string", length=255, nullable=true)
     */
    private $fredufonctadm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FrEduGestResp", type="text", length=65535, nullable=true)
     */
    private $fredugestresp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ctemail", type="string", length=255, nullable=true)
     */
    private $ctemail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codaca", type="string", length=255, nullable=true)
     */
    private $codaca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FrEduUrlRetour", type="string", length=255, nullable=true)
     */
    private $freduurlretour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ctgrps", type="string", length=255, nullable=true)
     */
    private $ctgrps;



    /**
     * Get the value of ctremoteuser
     *
     * @return  string
     */ 
    public function getCtremoteuser()
    {
        return $this->ctremoteuser;
    }

    /**
     * Set the value of ctremoteuser
     *
     * @param  string  $ctremoteuser
     *
     * @return  self
     */ 
    public function setCtremoteuser(string $ctremoteuser)
    {
        $this->ctremoteuser = $ctremoteuser;

        return $this;
    }

    public function __toString()
    {
        return $this->ctremoteuser;
    }

    /**
     * Get the value of idUtilisateur
     *
     * @return  int
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}
