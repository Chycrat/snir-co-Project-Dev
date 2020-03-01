<?php

namespace App\Form;

use App\Entity\MaderaProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_projet')
            ->add('nom_projet')
            ->add('date_creation_projet')
            ->add('date_modification_projet')
            ->add('maderaCommercial')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaProjet::class,
        ]);
    }
}
