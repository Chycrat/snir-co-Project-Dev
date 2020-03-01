<?php

namespace App\Form;

use App\Entity\MaderaCommercial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaCommercialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_commercial')
            ->add('prenom_commercial')
            ->add('nom_commercial')
            ->add('mot_de_passe_commercial')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaCommercial::class,
        ]);
    }
}
