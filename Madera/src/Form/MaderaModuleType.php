<?php

namespace App\Form;

use App\Entity\MaderaModule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_module')
            ->add('nom_module')
            ->add('prix_ht_module')
            ->add('quantite_restante_module')
            ->add('coordonnee_x_debut_module')
            ->add('coordonnee_x_fin_module')
            ->add('coordonnee_y_debut_module')
            ->add('coordonnee_y_fin_module')
            ->add('largeur_module')
            ->add('longueur_module')
            ->add('nb_composant_module')
            ->add('gamme_module')
            ->add('composants')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaModule::class,
        ]);
    }
}
