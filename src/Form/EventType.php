<?php

namespace App\Form;

use App\Entity\Event;

use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name')
            ->add('Creator')
            ->add('Date_debut', DateType::class)
            ->add('Date_fin', DateType::class)
            ->add('description')
            ->add('lieu')
            ->add('image')
            ->add('Id_depart')
            ->add('entree')
            ->add('plat')
            ->add('dessert');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
