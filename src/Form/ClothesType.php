<?php

namespace App\Form;

use App\Entity\Clothes;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ClothesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez le nom du nouveau vêtement'
                ]
            ])
            ->add('Brand', TextType::class, [
                'label' => 'Nom de la marque',
                'attr' => [
                    'placeholder' => 'Entrez le nom de la marque'
                    ]
                    ])
            ->add('Price', TextType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Entrez le prix du vêtement (en EURO)'
                ]
            ])
            ->add('Year', DateType::class, [
                'format' => 'yyyy-MM-dd',
            ])
            // ->add('Link', TextareaType::class, [
            //     'label', 'Lien',
            //     'attr' => [
            //         'placeholder' => 'Copier le lien vers le site de vente du produit'
            //     ]
            // ])
            ->add('Novelty')
            ->add('category', EntityType::class, [
                'choice_label'=> 'name',
                'class'=> Category::class,
                'label'=>'Category'
            ])
            ->add('UpdateTime')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clothes::class,
        ]);
    }
}
