<?php

namespace App\Form;

use App\Entity\Loto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Loto1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annee_numero_de_tirage')
            ->add('jour_de_tirage')
            ->add('date_de_tirage')
            ->add('date_de_forclusion')
            ->add('boule_1')
            ->add('boule_2')
            ->add('boule_3')
            ->add('boule_4')
            ->add('boule_5')
            ->add('numero_chance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Loto::class,
        ]);
    }
}
