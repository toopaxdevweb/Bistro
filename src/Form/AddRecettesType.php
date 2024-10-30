<?php

namespace App\Form;

use App\Entity\Budget;
use App\Entity\Categorie;
use App\Entity\Difficulte;
use App\Entity\Ingredient;
use App\Entity\Recette;
use App\Entity\Saison;
use App\Entity\Tag;
use App\Entity\User;
use App\Entity\Ustensile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddRecettesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('image')
            ->add('temps')
            ->add('description')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('idUser', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'pseudo',
            ])
            ->add('ustensile', EntityType::class, [
                'class' => Ustensile::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',  // Remplace "nom" par le champ que tu veux afficher
                'expanded' => true,        // Affiche les options sous forme de cases à cocher
                'multiple' => true,        // Permet de sélectionner plusieurs catégories
                'label' => 'Catégorie',
                'required' => false,
            ])
            ->add('ingredient', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'nom',
                'expanded' => true,        // Affiche les options sous forme de cases à cocher
                'multiple' => true,        // Permet de sélectionner plusieurs catégories
                'label' => 'ingredient',
                'required' => false,
            ])
            ->add('difficulte', EntityType::class, [
                'class' => Difficulte::class,
                'choice_label' => 'nom',
            ])
            ->add('budget', EntityType::class, [
                'class' => Budget::class,
                'choice_label' => 'nom',
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('saison', EntityType::class, [
                'class' => Saison::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
