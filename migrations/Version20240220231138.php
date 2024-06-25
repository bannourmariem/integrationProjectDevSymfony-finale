<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220231138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, nom_assurance VARCHAR(255) NOT NULL, adresse_assurance VARCHAR(255) NOT NULL, code_postal_assurance VARCHAR(255) NOT NULL, tel_assurance VARCHAR(255) NOT NULL, email_assurance VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE constat ADD date_accident DATE DEFAULT NULL, ADD heure TIME NOT NULL, ADD localisation VARCHAR(255) NOT NULL, ADD blesse_meme_leger TINYINT(1) NOT NULL, ADD degats_autre_vehicule TINYINT(1) NOT NULL, ADD degats_autre_objets TINYINT(1) NOT NULL, ADD temoins VARCHAR(255) NOT NULL, ADD a_preneur_nom VARCHAR(255) NOT NULL, ADD a_preneur_prenom VARCHAR(255) NOT NULL, ADD a_preneur_adresse VARCHAR(255) NOT NULL, ADD a_preneur_code_postal VARCHAR(255) NOT NULL, ADD a_preneur_tel VARCHAR(255) NOT NULL, ADD a_preneur_email VARCHAR(255) NOT NULL, ADD a_vehicule_moteur_marque VARCHAR(255) NOT NULL, ADD a_vehicule_moteur_num_immatriculation VARCHAR(255) NOT NULL, ADD a_vehicule_moteur_pays_immatriculation VARCHAR(255) NOT NULL, ADD a_vehicule_remorque_num_immatriculation VARCHAR(255) NOT NULL, ADD a_vehicule_remorque_pays_immatriculation VARCHAR(255) NOT NULL, ADD a_societe_assurance_nom VARCHAR(255) NOT NULL, ADD a_societe_assurance_num_contrat VARCHAR(255) NOT NULL, ADD a_societe_assurance_num_carte_verte VARCHAR(255) NOT NULL, ADD a_societe_assurance_attestation_valable_du DATE DEFAULT NULL, ADD a_societe_assurance_attestation_valable_au DATE DEFAULT NULL, ADD a_societe_assurance_agence_nom VARCHAR(255) NOT NULL, ADD a_societe_assurance_agence_adresse VARCHAR(255) NOT NULL, ADD a_societe_assurance_agence_pays VARCHAR(255) NOT NULL, ADD a_societe_assurance_agence_tel VARCHAR(255) NOT NULL, ADD a_societe_assurance_degats_materiels_assure_par_contrat TINYINT(1) NOT NULL, ADD a_conducteur_nom VARCHAR(255) NOT NULL, ADD a_conducteur_prenom VARCHAR(255) NOT NULL, ADD a_conducteur_date_naissance DATE DEFAULT NULL, ADD a_conducteur_adresse VARCHAR(255) NOT NULL, ADD a_conducteur_pays VARCHAR(255) NOT NULL, ADD a_conducteur_tel VARCHAR(255) NOT NULL, ADD a_conducteur_num_permis_comduite VARCHAR(255) NOT NULL, ADD a_conducteur_categorie VARCHAR(255) NOT NULL, ADD a_conducteur_permis_valable_jusqua DATE DEFAULT NULL, ADD a_degats VARCHAR(255) NOT NULL, ADD a_observation VARCHAR(255) NOT NULL, ADD b_preneur_nom VARCHAR(255) NOT NULL, ADD b_preneur_prenom VARCHAR(255) NOT NULL, ADD b_preneur_adresse VARCHAR(255) NOT NULL, ADD b_preneur_code_postal VARCHAR(255) NOT NULL, ADD b_preneur_pays VARCHAR(255) NOT NULL, ADD b_preneur_tel VARCHAR(255) NOT NULL, ADD b_vehicule_moteur_marque VARCHAR(255) NOT NULL, ADD b_vehicule_moteur_num_immatriculation VARCHAR(255) NOT NULL, ADD b_vehicule_moteur_pays_immatriculation VARCHAR(255) NOT NULL, ADD b_vehicule_remorque_num_immatriculation VARCHAR(255) NOT NULL, ADD b_vehicule_remorque_pays_immatriculation VARCHAR(255) NOT NULL, ADD b_societe_assurance_nom VARCHAR(255) NOT NULL, ADD b_societe_assurance_num_contrat VARCHAR(255) NOT NULL, ADD b_societe_assurance_num_carte_verte VARCHAR(255) NOT NULL, ADD b_societe_assurance_attestation_valable_du DATE DEFAULT NULL, ADD b_societe_assurance_attestation_valable_au DATE DEFAULT NULL, ADD b_societe_assurance_agence_nom VARCHAR(255) NOT NULL, ADD b_societe_assurance_agence_adresse VARCHAR(255) NOT NULL, ADD b_societe_assurance_agence_pays VARCHAR(255) NOT NULL, ADD b_societe_assurance_agence_tel VARCHAR(255) NOT NULL, ADD b_societe_assurance_degats_materiels_assure_par_contrat TINYINT(1) NOT NULL, ADD b_conducteur_nom VARCHAR(255) NOT NULL, ADD b_conducteur_prenom VARCHAR(255) NOT NULL, ADD b_conducteur_date_naissance DATE DEFAULT NULL, ADD b_conducteur_adresse VARCHAR(255) NOT NULL, ADD b_conducteur_pays VARCHAR(255) NOT NULL, ADD b_conducteur_tel VARCHAR(255) NOT NULL, ADD b_conducteur_num_permis_comduite VARCHAR(255) NOT NULL, ADD b_conducteur_categorie VARCHAR(255) NOT NULL, ADD b_conducteur_permis_valable_jusqua DATE DEFAULT NULL, ADD b_degats VARCHAR(255) NOT NULL, ADD b_observation VARCHAR(255) NOT NULL, ADD relation_id INT DEFAULT NULL, DROP image_file_name');
        $this->addSql('ALTER TABLE constat ADD CONSTRAINT FK_F96EDD983256915B FOREIGN KEY (relation_id) REFERENCES assurance (id)');
        $this->addSql('CREATE INDEX IDX_F96EDD983256915B ON constat (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assurance');
        $this->addSql('ALTER TABLE constat DROP FOREIGN KEY FK_F96EDD983256915B');
        $this->addSql('DROP INDEX IDX_F96EDD983256915B ON constat');
        $this->addSql('ALTER TABLE constat ADD image_file_name VARCHAR(255) DEFAULT NULL, DROP date_accident, DROP heure, DROP localisation, DROP blesse_meme_leger, DROP degats_autre_vehicule, DROP degats_autre_objets, DROP temoins, DROP a_preneur_nom, DROP a_preneur_prenom, DROP a_preneur_adresse, DROP a_preneur_code_postal, DROP a_preneur_tel, DROP a_preneur_email, DROP a_vehicule_moteur_marque, DROP a_vehicule_moteur_num_immatriculation, DROP a_vehicule_moteur_pays_immatriculation, DROP a_vehicule_remorque_num_immatriculation, DROP a_vehicule_remorque_pays_immatriculation, DROP a_societe_assurance_nom, DROP a_societe_assurance_num_contrat, DROP a_societe_assurance_num_carte_verte, DROP a_societe_assurance_attestation_valable_du, DROP a_societe_assurance_attestation_valable_au, DROP a_societe_assurance_agence_nom, DROP a_societe_assurance_agence_adresse, DROP a_societe_assurance_agence_pays, DROP a_societe_assurance_agence_tel, DROP a_societe_assurance_degats_materiels_assure_par_contrat, DROP a_conducteur_nom, DROP a_conducteur_prenom, DROP a_conducteur_date_naissance, DROP a_conducteur_adresse, DROP a_conducteur_pays, DROP a_conducteur_tel, DROP a_conducteur_num_permis_comduite, DROP a_conducteur_categorie, DROP a_conducteur_permis_valable_jusqua, DROP a_degats, DROP a_observation, DROP b_preneur_nom, DROP b_preneur_prenom, DROP b_preneur_adresse, DROP b_preneur_code_postal, DROP b_preneur_pays, DROP b_preneur_tel, DROP b_vehicule_moteur_marque, DROP b_vehicule_moteur_num_immatriculation, DROP b_vehicule_moteur_pays_immatriculation, DROP b_vehicule_remorque_num_immatriculation, DROP b_vehicule_remorque_pays_immatriculation, DROP b_societe_assurance_nom, DROP b_societe_assurance_num_contrat, DROP b_societe_assurance_num_carte_verte, DROP b_societe_assurance_attestation_valable_du, DROP b_societe_assurance_attestation_valable_au, DROP b_societe_assurance_agence_nom, DROP b_societe_assurance_agence_adresse, DROP b_societe_assurance_agence_pays, DROP b_societe_assurance_agence_tel, DROP b_societe_assurance_degats_materiels_assure_par_contrat, DROP b_conducteur_nom, DROP b_conducteur_prenom, DROP b_conducteur_date_naissance, DROP b_conducteur_adresse, DROP b_conducteur_pays, DROP b_conducteur_tel, DROP b_conducteur_num_permis_comduite, DROP b_conducteur_categorie, DROP b_conducteur_permis_valable_jusqua, DROP b_degats, DROP b_observation, DROP relation_id');
    }
}