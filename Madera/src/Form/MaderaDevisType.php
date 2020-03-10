<?php

namespace App\Form;

use App\Entity\MaderaDevis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaderaDevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code_devis')
            ->add('date_devis')
            ->add('date_validation')
            ->add('montant_ht_devis')
            ->add('montant_ttc_devis')
            ->add('marge_commerciaux_devis')
            ->add('marge_entreprise_devis')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaderaDevis::class,
        ]);
    }
}
