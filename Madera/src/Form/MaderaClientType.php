<?php

namespace App\Form;

use App\Entity\MaderaClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_client')
            ->add('nom_client')
            ->add('code_client')
            ->add('mdp_client')
            ->add('telephone_client')
            ->add('adresse_client')
            ->add('email_client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaClient::class,
        ]);
    }
}
