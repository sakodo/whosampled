<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Cette classe représente le formulaire de la barre de recherche
class SearchBarType extends AbstractType
{
    // Cette méthode construit le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Ajoute un champ de texte pour la recherche
            ->add('search', TextType::class, [
                'label' => false, // Pas de label pour ce champ
                'attr' => [
                    'placeholder' => 'Rechercher' // Placeholder pour ce champ
                ]
            ]);
        // Le bouton de soumission est commenté, vous pouvez le décommenter si nécessaire
        //->add('recherche', SubmitType::class,[
        //    'attr' => [
        //        'class' => 'btn btn-primary' // Classe CSS pour le bouton
        //    ]
        //])
    }

    // Cette méthode configure les options du formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Pas d'options par défaut pour ce formulaire
        ]);
    }
}
