<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Categorie;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
USE FOS\CKEditorBundle\Form\Type\CKEditorType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'titre',
            ])
            ->add('auteur')
            ->add('resume')
            ->add('contenu', CKEditorType::class)
            ->add('created_At')
            ->add('articles_image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
