<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Cette classe représente le formulaire d'inscription
class InscriptionType extends AbstractType
{
    // Cette méthode construit le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Ajoute un champ pour le prénom
            ->add('firstname')
            // Ajoute un champ pour le nom de famille
            ->add('lastname')
            // Ajoute un champ pour l'email
            ->add('email')
            // Ajoute un champ pour les rôles
            ->add('roles')
            // Ajoute un champ pour le mot de passe
            ->add('password');
    }

    // Cette méthode configure les options du formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Définit la classe de l'entité à laquelle ce formulaire est lié
            'data_class' => User::class,
        ]);
    }
}
