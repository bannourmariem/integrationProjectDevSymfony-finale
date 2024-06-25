<?php

namespace App\Entity;

use App\Repository\ConstatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;




#[ORM\Entity(repositoryClass: ConstatRepository::class)]

#[Vich\Uploadable]
class Constat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    
   /* #[ORM\ManyToOne(inversedBy: 'constats')]
    private ?Assurance $relation_assurance = null;  */

  
   /* #[ORM\Column(type: Types::DATE_MUTABLE  )]
    private ?\DateTimeInterface $date_accident = null; */


    /* #[ORM\Column(length: 255, nullable:true )]
    private  $image=null;

    #[Vich\UploadableField(mapping:"constats_images", fileNameProperty:"image")]
    private $imageFile; 
 */

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La localisation doit être non vide")]
    #[Assert\Length(
        min: 5,
        minMessage: "Entrer La localisation d'au moins 5 caractères"
    )]
    private ?string $localisation = null;


    #[ORM\Column(length: 255)]
    private ?string $temoins = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom Assurance doit être non vide")]
    #[Assert\Length(
        min: 3,
        minMessage: "Entrer un nom Assurance d'au moins 5 caractères"
    )]
    private ?string $A_preneur_nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le prennom Assurance doit être non vide")]
    #[Assert\Length(
        min: 3,
        minMessage: "Entrer un prennom Assurance d'au moins 5 caractères"
    )]
    private ?string $A_preneur_prenom = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message :"Le numéro de téléphone ne peut pas être vide.")]
     #[Assert\Regex(
    pattern :"/^\d{8}$/",
    message :"Le numéro de téléphone doit contenir exactement 8 chiffres."
)]
    private ?string $A_preneur_tel = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom moteur doit être non vide")]
    #[Assert\Length(
        min: 3,
        minMessage: "Entrer un nom moteur d'au moins 5 caractères"
    )]
    private ?string $A_vehicule_moteur_marque = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Numéro d'immatriculation ne doit pas être vide")]
    #[Assert\Length(
    max : 255,
    maxMessage : "Numéro d'immatriculation doit contenir au maximum {{ limit }} caractères"
)]
    private ?string $A_vehicule_moteur_numImmatriculation = null;

/*
    #[ORM\Column(length: 255)]
    private ?string $A_societeAssurance_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $A_societeAssurance_numContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $A_societeAssurance_numCarteVerte = null;

    #[ORM\Column(type: Types::DATE_MUTABLE , nullable: true)]
    private ?\DateTimeInterface $A_societeAssurance_attestationValable_du = null;

    #[ORM\Column(type: Types::DATE_MUTABLE , nullable: true)]
    private ?\DateTimeInterface $A_societeAssurance_attestationValable_au = null;
*/

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom Assurance doit être non vide")]
    #[Assert\Length(
        min: 3,
        minMessage: "Entrer un nom Assurance d'au moins 3 caractères"
    )]
    private ?string $A_societeAssurance_agence_nom = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'adresse doit être non vide")]
    #[Assert\Length(
        min: 5,
        minMessage: "Entrer une adresse  d'au moins 3 caractères"
    )]
    private ?string $A_societeAssurance_agence_adresse = null;










    #[ORM\Column(length: 255)]
    private ?string $B_preneur_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $B_preneur_prenom = null;

   

    #[ORM\Column(length: 255)]
    private ?string $B_preneur_tel = null;

    #[ORM\Column(length: 255)]
    private ?string $B_vehicule_moteur_marque = null;

    #[ORM\Column(length: 255)]
    private ?string $B_vehicule_moteur_numImmatriculation = null;


    #[ORM\Column(length: 255)]
    private ?string $B_societeAssurance_agence_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $B_societeAssurance_agence_adresse = null;

    #[ORM\Column]
    private ?bool $stationnement_arret = null;

    #[ORM\Column]
    private ?bool $quittaitStationnement_arret = null;
 
  
    #[ORM\Column]
    private ?bool $prenait_stationnement = null;

    #[ORM\Column]
    private ?bool $sortaitDun_parking_lieu = null;

   
    #[ORM\Column]
    private ?bool $doublait = null;

    #[ORM\Column]
    private ?bool $viraitDroite = null;

    #[ORM\Column(length: 255)]
    private ?bool $viraitGauche = null;

    
   /* #[ORM\ManyToOne(inversedBy: 'constats')]
    private ?User $createdby = null; */


   /* public function getRelation(): ?Assurance
{
    return $this->relation_assurance;
}

public function setRelation(?Assurance $relation_assurance): static
{
    $this->relation_assurance = $relation_assurance;

    return $this;
}
*/
    public function getId(): ?int
    {
        return $this->id;
    }

/*
    public function getDateAccident(): ?\DateTimeInterface
    {
        return $this->date_accident;
    }

    public function setDateAccident(\DateTimeInterface $date_accident): static
    {
        $this->date_accident = $date_accident;

        return $this;
    }  */
   
   
   
   


    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }



    public function getTemoins(): ?string
    {
        return $this->temoins;
    }

    public function setTemoins(string $temoins): static
    {
        $this->temoins = $temoins;

        return $this;
    }

    public function getAPreneurNom(): ?string
    {
        return $this->A_preneur_nom;
    }

    public function setAPreneurNom(string $A_preneur_nom): static
    {
        $this->A_preneur_nom = $A_preneur_nom;

        return $this;
    }

    public function getAPreneurPrenom(): ?string
    {
        return $this->A_preneur_prenom;
    }

    public function setAPreneurPrenom(string $A_preneur_prenom): static
    {
        $this->A_preneur_prenom = $A_preneur_prenom;

        return $this;
    }

    public function getAPreneurTel(): ?string
    {
        return $this->A_preneur_tel;
    }

    public function setAPreneurTel(string $A_preneur_tel): static
    {
        $this->A_preneur_tel = $A_preneur_tel;

        return $this;
    }

  

    public function getAVehiculeMoteurMarque(): ?string
    {
        return $this->A_vehicule_moteur_marque;
    }

    public function setAVehiculeMoteurMarque(string $A_vehicule_moteur_marque): static
    {
        $this->A_vehicule_moteur_marque = $A_vehicule_moteur_marque;

        return $this;
    }

    public function getAVehiculeMoteurNumImmatriculation(): ?string
    {
        return $this->A_vehicule_moteur_numImmatriculation;
    }

    public function setAVehiculeMoteurNumImmatriculation(string $A_vehicule_moteur_numImmatriculation): static
    {
        $this->A_vehicule_moteur_numImmatriculation = $A_vehicule_moteur_numImmatriculation;

        return $this;
    }


/*
    public function getASocieteAssuranceNom(): ?string
    {
        return $this->A_societeAssurance_nom;
    }

    public function setASocieteAssuranceNom(string $A_societeAssurance_nom): static
    {
        $this->A_societeAssurance_nom = $A_societeAssurance_nom;

        return $this;
    }

    public function getASocieteAssuranceNumContrat(): ?string
    {
        return $this->A_societeAssurance_numContrat;
    }

    public function setASocieteAssuranceNumContrat(string $A_societeAssurance_numContrat): static
    {
        $this->A_societeAssurance_numContrat = $A_societeAssurance_numContrat;

        return $this;
    }

    public function getASocieteAssuranceNumCarteVerte(): ?string
    {
        return $this->A_societeAssurance_numCarteVerte;
    }

    public function setASocieteAssuranceNumCarteVerte(string $A_societeAssurance_numCarteVerte): static
    {
        $this->A_societeAssurance_numCarteVerte = $A_societeAssurance_numCarteVerte;

        return $this;
    }

    public function getASocieteAssuranceAttestationValableDu(): ?\DateTimeInterface
    {
        return $this->A_societeAssurance_attestationValable_du;
    }

    public function setASocieteAssuranceAttestationValableDu(\DateTimeInterface $A_societeAssurance_attestationValable_du): static
    {
        $this->A_societeAssurance_attestationValable_du = $A_societeAssurance_attestationValable_du ?: null;

        return $this;
    }


    public function getASocieteAssuranceAttestationValableAu(): ?\DateTimeInterface
    {
        return $this->A_societeAssurance_attestationValable_au;
    }

    public function setASocieteAssuranceAttestationValableAu(\DateTimeInterface $A_societeAssurance_attestationValable_au): static
    {
        $this->A_societeAssurance_attestationValable_au = $A_societeAssurance_attestationValable_au?: null;

        return $this;
    }

    */
    public function getASocieteAssuranceAgenceNom(): ?string
    {
        return $this->A_societeAssurance_agence_nom;
    }

    public function setASocieteAssuranceAgenceNom(string $A_societeAssurance_agence_nom): static
    {
        $this->A_societeAssurance_agence_nom = $A_societeAssurance_agence_nom;

        return $this;
    }

    public function getASocieteAssuranceAgenceAdresse(): ?string
    {
        return $this->A_societeAssurance_agence_adresse;
    }

    public function setASocieteAssuranceAgenceAdresse(string $A_societeAssurance_agence_adresse): static
    {
        $this->A_societeAssurance_agence_adresse = $A_societeAssurance_agence_adresse;

        return $this;
    }


    /*

    public function getAConducteurPermisValableJusqua(): ?\DateTimeInterface
    {
        return $this->A_conducteur_permisValableJusqua;
    }

    public function setAConducteurPermisValableJusqua(\DateTimeInterface $A_conducteur_permisValableJusqua): static
    {
        $this->A_conducteur_permisValableJusqua = $A_conducteur_permisValableJusqua;

        return $this;
    }
*/



    public function getBPreneurNom(): ?string
    {
        return $this->B_preneur_nom;
    }

    public function setBPreneurNom(string $B_preneur_nom): static
    {
        $this->B_preneur_nom = $B_preneur_nom;

        return $this;
    }

    public function getBPreneurPrenom(): ?string
    {
        return $this->B_preneur_prenom;
    }

    public function setBPreneurPrenom(string $B_preneur_prenom): static
    {
        $this->B_preneur_prenom = $B_preneur_prenom;

        return $this;
    }

    public function getBPreneurTel(): ?string
    {
        return $this->B_preneur_tel;
    }

    public function setBPreneurTel(string $B_preneur_tel): static
    {
        $this->B_preneur_tel = $B_preneur_tel;

        return $this;
    }

    public function getBVehiculeMoteurMarque(): ?string
    {
        return $this->B_vehicule_moteur_marque;
    }

    public function setBVehiculeMoteurMarque(string $B_vehicule_moteur_marque): static
    {
        $this->B_vehicule_moteur_marque = $B_vehicule_moteur_marque;

        return $this;
    }

    public function getBVehiculeMoteurNumImmatriculation(): ?string
    {
        return $this->B_vehicule_moteur_numImmatriculation;
    }

    public function setBVehiculeMoteurNumImmatriculation(string $B_vehicule_moteur_numImmatriculation): static
    {
        $this->B_vehicule_moteur_numImmatriculation = $B_vehicule_moteur_numImmatriculation;

        return $this;
    }


    public function getBSocieteAssuranceAgenceNom(): ?string
    {
        return $this->B_societeAssurance_agence_nom;
    }

    public function setBSocieteAssuranceAgenceNom(string $B_societeAssurance_agence_nom): static
    {
        $this->B_societeAssurance_agence_nom = $B_societeAssurance_agence_nom;

        return $this;
    }

    public function getBSocieteAssuranceAgenceAdresse(): ?string
    {
        return $this->B_societeAssurance_agence_adresse;
    }

    public function setBSocieteAssuranceAgenceAdresse(string $B_societeAssurance_agence_adresse): static
    {
        $this->B_societeAssurance_agence_adresse = $B_societeAssurance_agence_adresse;

        return $this;
    }


    public function isStationnementArret(): ?bool
    {
        return $this->stationnement_arret;
    }

    public function setStationnementArret(bool $stationnement_arret): static
    {
        $this->stationnement_arret = $stationnement_arret;

        return $this;
    }

    public function isQuittaitStationnementArret(): ?bool
    {
        return $this->quittaitStationnement_arret;
    }

    public function setQuittaitStationnementArret(bool $quittaitStationnement_arret): static
    {
        $this->quittaitStationnement_arret = $quittaitStationnement_arret;

        return $this;
    }


    public function isPrenaitStationnement(): ?bool
    {
        return $this->prenait_stationnement;
    }

    public function setPrenaitStationnement(bool $prenait_stationnement): static
    {
        $this->prenait_stationnement = $prenait_stationnement;

        return $this;
    }

    
    public function isSortaitDunParkingLieu(): ?bool
    {
        return $this->sortaitDun_parking_lieu;
    }

    public function setSortaitDunParkingLieu(bool $sortaitDun_parking_lieu): static
    {
        $this->sortaitDun_parking_lieu = $sortaitDun_parking_lieu;

        return $this;
    }

    public function isDoublait(): ?bool
    {
        return $this->doublait;
    }

    public function setDoublait(bool $doublait): static
    {
        $this->doublait = $doublait;

        return $this;
    }

    public function isViraitDroite(): ?bool
    {
        return $this->viraitDroite;
    }

    public function setViraitDroite(bool $viraitDroite): static
    {
        $this->viraitDroite = $viraitDroite;

        return $this;
    }

    public function getViraitGauche(): ?bool
    {
        return $this->viraitGauche;
    }

    public function setViraitGauche(bool $viraitGauche): static
    {
        $this->viraitGauche = $viraitGauche;

        return $this;
    }



 /* public function getCreatedby(): ?User
    {
        return $this->createdby;
    }

    public function setCreatedby(?User $createdby): static
    {
        $this->createdby = $createdby;

        return $this;
    }

  */

}
