<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'user_edit_input',
                    'label' => 'Email',
                ],
            ])
            ->add('Firstname', TextType::class, [
                'attr' => [
                    'class' => 'user_edit_input',
                    'label' => 'Nom'
                ],
            ])
            ->add('Lastname', TextType::class, [
                'attr' => [
                    'class' => 'user_edit_input',
                    'label' => 'Prenom'
                ],
            ])
            ->add('Telephone', TextType::class, [
                'attr' => [
                    'class' => 'user_edit_input',
                    'label' => 'Numéro de téléphone'
                ],
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => ['class' => 'user_edit_btn'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
