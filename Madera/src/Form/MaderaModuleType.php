<?php

namespace App\Form;

use App\Entity\MaderaModule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_module')
            ->add('description_module')
            ->add('prix_ht_module')
            ->add('quantite_restante_module')
            ->add('composants')
            ->add('nb_composant_module')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaModule::class,
        ]);
    }
}
