<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Destination;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville', TextType::class, [
                'label' => 'ville de la destination',
            ])
            // ->add('lat')
            // ->add('lng')
            // ->add('created')
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'nom',]
            );
            // ->add('enregister', SubmitType::class [
            //     'attr' => [
            //         'class' => 'p-2 mb-1 bg-info text-white'
            //     ])
            //     ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Destination::class,
        ]);
    }
}
