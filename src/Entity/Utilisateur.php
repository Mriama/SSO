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

    public function getCtln(): ?string
    {
        return $this->ctln;
    }

    public function setCtln(string $ctln): self
    {
        $this->ctln = $ctln;

        return $this;
    }

    public function getCtfn(): ?string
    {
        return $this->ctfn;
    }

    public function setCtfn(string $ctfn): self
    {
        $this->ctfn = $ctfn;

        return $this;
    }

    public function getFredurneresp(): ?string
    {
        return $this->fredurneresp;
    }

    public function setFredurneresp(?string $fredurneresp): self
    {
        $this->fredurneresp = $fredurneresp;

        return $this;
    }

    public function getFreduresdel(): ?string
    {
        return $this->freduresdel;
    }

    public function setFreduresdel(?string $freduresdel): self
    {
        $this->freduresdel = $freduresdel;

        return $this;
    }

    public function getFredufonctadm(): ?string
    {
        return $this->fredufonctadm;
    }

    public function setFredufonctadm(?string $fredufonctadm): self
    {
        $this->fredufonctadm = $fredufonctadm;

        return $this;
    }

    public function getFredugestresp(): ?string
    {
        return $this->fredugestresp;
    }

    public function setFredugestresp(?string $fredugestresp): self
    {
        $this->fredugestresp = $fredugestresp;

        return $this;
    }

    public function getCtemail(): ?string
    {
        return $this->ctemail;
    }

    public function setCtemail(?string $ctemail): self
    {
        $this->ctemail = $ctemail;

        return $this;
    }

    public function getCodaca(): ?string
    {
        return $this->codaca;
    }

    public function setCodaca(?string $codaca): self
    {
        $this->codaca = $codaca;

        return $this;
    }

    public function getFreduurlretour(): ?string
    {
        return $this->freduurlretour;
    }

    public function setFreduurlretour(?string $freduurlretour): self
    {
        $this->freduurlretour = $freduurlretour;

        return $this;
    }

    public function getCtgrps(): ?string
    {
        return $this->ctgrps;
    }

    public function setCtgrps(?string $ctgrps): self
    {
        $this->ctgrps = $ctgrps;

        return $this;
    }
}
