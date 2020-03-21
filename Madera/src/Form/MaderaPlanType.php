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
            ->add('largeur_plan')
            ->add('longueur_plan')
            ->add('maderaToit')
            ->add('maderaCoupe')
            ->add('maderaSol')
            ->add('maderaProjet')
            ->add('maderaGamme')
            ->add('maderaModules')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaPlan::class,
        ]);
    }
}
