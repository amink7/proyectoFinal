<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class OfertaType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descuento', TextType::class, array('label' => 'Descuento', 'attr' => array('class' => 'input')))
        ->add('nombre', TextType::class, array('label' => 'Nombre', 'attr' => array('class' => 'input')))
        ->add('guardar', SubmitType::class, array('attr' => array('class' => 'submit')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Oferta'
        ));
    }


}