<?php

namespace App\Form;

use App\Entity\Blog;
use App\Entity\Blogcategory;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo')
            ->add('titre')
            ->add('auteur')
            ->add('blogcategory', EntityType::class,
            array(
                'class' => Blogcategory::class,
                'label' => "Catégorie",
                'required' => true,
                'multiple' => true,
                'choice_label' => "rubrique"
            ))
            ->add('date')
            ->add('texte', CKEditorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}
