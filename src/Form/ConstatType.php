<?php

namespace App\Form;

use App\Entity\Assurance;
use App\Entity\Constat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichFileType;

use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;





class ConstatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
      
        
        
        

         ->add('localisation')
        ->add('temoins')

        
        ->add('A_preneur_nom')
        ->add('A_preneur_prenom')
        ->add('A_preneur_tel')

        ->add('A_vehicule_moteur_marque')
        ->add('A_vehicule_moteur_numImmatriculation')
        ->add('A_societeAssurance_agence_nom')
        ->add('A_societeAssurance_agence_adresse')
       
            ->add('B_preneur_nom')
            ->add('B_preneur_prenom')
            ->add('B_preneur_tel')

            ->add('B_vehicule_moteur_marque')
            ->add('B_vehicule_moteur_numImmatriculation')
            ->add('B_societeAssurance_agence_nom')
            ->add('B_societeAssurance_agence_adresse')
            
           
          ->add('stationnement_arret' )
            ->add('quittaitStationnement_arret')
            ->add('prenait_stationnement')
            ->add('sortaitDun_parking_lieu')

            ->add('doublait')
            ->add('viraitDroite')
            ->add('viraitGauche')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Constat::class,
        ]);
    }
}
