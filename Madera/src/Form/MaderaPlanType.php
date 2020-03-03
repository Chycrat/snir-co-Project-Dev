<?php

namespace App\Form;

use App\Entity\MaderaPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_plan')
            ->add('date_creation')
            ->add('date_derniere_modification')
            ->add('largeur_plan')
            ->add('longueur_plan')
            ->add('prix_total_ht_plan')
            ->add('prix_total_ttc_plan')
            ->add('maderaToit')
            ->add('maderaCoupe')
            ->add('maderaSol')
            ->add('maderaClient')
            ->add('maderaProjet')
            ->add('maderaGamme')
            ->add('Enregistrer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaPlan::class,
        ]);
    }
}
