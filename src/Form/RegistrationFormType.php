<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Email'
    ]
                ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control', 'placeholder' => 'Mot de passe'

                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom', TextType::class,[
                'attr' => [
        'class' => 'form-control',
                    'placeholder' => 'Nom'
                ]
    ])
            ->add('prenom', TextType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Prénom'
    ]
    ])
            ->add('type', ChoiceType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Particulier ou Professionnel'
    ],
                'choices' => [
                    'Particulier' => true,
                    'Professionnel' => false,
                ]
    ])
            ->add('telephone', TextType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Téléphone'

    ],
    ])
            ->add('u_adresse', TextType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Votre adresse'
    ],
    ])
            ->add('u_ville', TextType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Ville'
    ],
    ])
            ->add('u_cp', TextType::class, [
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Code Postal'
    ],
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
