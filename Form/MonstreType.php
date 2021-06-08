<?php

namespace App\Form;

use App\Entity\Monstre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonstreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('type')
            ->add('element')
            ->add('faiblesses')
            ->add('resistances')
            ->add('cartes')
            ->add('armure_id')
            ->add('arme_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Monstre::class,
        ]);
    }
}
