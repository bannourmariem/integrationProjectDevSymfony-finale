<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $couverture = null;

    #[ORM\Column(nullable: true)]
    private ?int $prix = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $debut = null;

    #[ORM\Column(nullable:true,type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $fin = null;

    #[ORM\Column( nullable: true)]
    private ?bool $statut = null;

   


    #[ORM\ManyToMany(targetEntity: Facture::class, mappedBy: 'contrat')]
    private Collection $factures;

   

  

    #[ORM\Column( nullable: true)]
    private ?bool $sent = null;

    #[ORM\Column( nullable: true)]
    private ?bool $confirmed = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    private ?Offre $offre = null;

    

    #[ORM\Column]
    private ?int $engagement = null;

    #[ORM\Column(length: 255)]
    private ?string $client = null;

    

        public function __construct()
    {
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouverture(): ?string
    {
        return $this->couverture;
    }

    public function setCouverture(string $couverture): static
    {
        $this->couverture = $couverture;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDebut(): ?\DateTimeImmutable
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeImmutable $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeImmutable
    {
        return $this->fin;
    }

    public function setfin(\DateTimeImmutable $fin): static
    {
        $this->fin = $fin;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

 
    
     

    /**
     * @return Collection<int, Facture>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    
 
 
    public function isSent(): ?bool
    {
        return $this->sent;
    }

    public function setSent(bool $sent): static
    {
        $this->sent = $sent;

        return $this;
    }

    public function isConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(bool $confirmed): static
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;

        return $this;
    }

 

    public function getEngagement(): ?int
    {
        return $this->engagement;
    }

    public function setEngagement(int $engagement): static
    {
        $this->engagement = $engagement;

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

    
 }
