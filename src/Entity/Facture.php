<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   



    #[ORM\Column(nullable: true)]

    private ?bool $statut = null;

    #[ORM\Column(nullable: true)]
    private ?int $totale = null;

    #[ORM\Column(nullable: true)]
    private ?int $tva = null;

    
    #[ORM\Column(nullable: true)]
    private ?\DateTime $Createdat = null;

    #[ORM\Column(length: 255)]
    private ?string $client = null;

    #[ORM\Column]
    private ?int $contrat = null;

    

     

 
 
   
    public function getId(): ?int
    {
        return $this->id;
    }
 

   

   

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTotale(): ?int
    {
        return $this->totale;
    }

    public function setTotale(int $totale): static
    {
        $this->totale = $totale;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(?int $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

     

    public function getCreatedat(): ?\DateTime
    {
        return $this->Createdat;
    }

    public function setCreatedat(?\DateTime $Createdat): static
    {
        $this->Createdat = $Createdat;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getContrat(): ?int
    {
        return $this->contrat;
    }

    public function setContrat(int $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }
 
 
}
