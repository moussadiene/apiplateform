<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ApiResource(normalizationContext={"groups"="alire"}) 
 * @ApiFilter(SearchFilter::class, properties={"compte": "exact"})
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("alire")
     */
    private $dateOperation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Groups("alire")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="operations")
     * 
     */
    private $numeroVirement;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taxesms;

    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("alire")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Typeoperation::class, inversedBy="operations")
     * @Groups("alire")
     */
    private $typeOperation;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operations")
     * @Groups("alire")
     */
    private $compte;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taxe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumeroVirement(): ?Client
    {
        return $this->numeroVirement;
    }

    public function setNumeroVirement(?Client $numeroVirement): self
    {
        $this->numeroVirement = $numeroVirement;

        return $this;
    }



    public function getTaxesms(): ?string
    {
        return $this->taxesms;
    }

    public function setTaxesms(?string $taxesms): self
    {
        $this->taxesms = $taxesms;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getTypeOperation(): ?Typeoperation
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(?Typeoperation $typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getTaxe(): ?string
    {
        return $this->taxe;
    }

    public function setTaxe(?string $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }
}
