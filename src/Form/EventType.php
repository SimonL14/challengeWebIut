<?php

namespace App\Form;

use App\Entity\Event;

use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', null, [
                'label' => 'Nom de l\'événement',
            ])
            ->add('Creator')
            ->add('Date_debut', null, [
                'label' => 'Date de début',
            ], DateType::class)
            ->add('Date_fin', null, [
                'label' => 'Date de fin',
            ], DateType::class)
            ->add('description', null, [
                'label' => 'Description  ',
            ])
            ->add('lieu', null, [
                'label' => 'Lieu',
            ])
            ->add('image', FileType::class, [
                'required' => true,
                'label' => 'Sélection image'
            ])
            ->add('Id_depart')
            ->add('entree')
            ->add('plat')
            ->add('dessert', null, [
                'label' => 'Département',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
