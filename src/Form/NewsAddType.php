<?php

namespace App\Form;

use App\Entity\News;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[

            ])
            ->add('extraFeed')
            ->add('lead', TextareaType::class)
            ->add('body',TextareaType::class)
            ->add('visible',CheckboxType::class,[
                'required' => false
            ])
            ->add('submit_btn', SubmitType::class, [
                'label' => 'mentés'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
