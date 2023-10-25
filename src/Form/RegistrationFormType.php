<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr' => [
                    'style' => 'background: #551e2e; border-radius: 15px;',
                    'class' => 'form-control place-color',
                    'placeholder' => 'Email'
    ]
                ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['style' => 'background: #551e2e; border-radi us: 15px;', 'autocomplete' => 'new-password', 'class' => 'form-control place-color', 'placeholder' => 'Mot de passe'
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
                    'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
                    'placeholder' => 'Nom'
                ]
    ])
            ->add('prenom', TextType::class, [
    'attr' => [
        'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
        'placeholder' => 'Prénom'
    ]
    ])
            ->add('type', ChoiceType::class, [
    'attr' => [
        'style' => 'background: #551e2e; color: white; border-radius: 15px;',
        'class' => 'form-control place-color',
        'placeholder' => 'Particulier ou Professionnel'
    ],
                'choices' => [
                    'Particulier' => true,
                    'Professionnel' => false,
                ]
    ])
            ->add('telephone', TextType::class, [
    'attr' => [
        'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
        'placeholder' => 'Téléphone'
    ],
    ])
            ->add('u_adresse', TextType::class, [
    'attr' => [
        'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
        'placeholder' => 'Votre adresse'
    ],
    ])
            ->add('u_ville', TextType::class, [
    'attr' => [
        'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
        'placeholder' => 'Ville'
    ],
    ])
            ->add('u_cp', TextType::class, [
    'attr' => [
        'style' => 'background: #551e2e; border-radius: 15px;',
        'class' => 'form-control place-color',
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
