<?php

namespace App\Form;

use App\Entity\Dier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Naam van het dier',
                ])
            ->add('description', TextType::class, [
                'label' => 'Beschrijving van het dier',
                ])
            ->add('opslaan', SubmitType::class, [
                'attr'=> array(
                    'class' => 'btn btn-dark'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dier::class,
        ]);
    }
}
