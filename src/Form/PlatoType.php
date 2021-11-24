<?php

namespace App\Form;
use App\Entity\Categorias;
use App\Entity\Oferta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PlatoType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array('label' => 'Nombre del plato', 'attr' => array('class' => 'input')))
        ->add('descripcion', TextType::class, array('label' => 'Descripción del plato', 'attr' => array('class' => 'input')))
        ->add('fechaCreacion', DateType::class, array('widget' => 'choice','attr' => ['class' => 'select']))
        ->add('precio', NumberType::class, array('attr' => array('class' => 'input')))
        ->add('categoria', EntityType::class, [
            'class' => Categorias::class,
            'choice_label' => 'nombre',            
        ])
        ->add('oferta', EntityType::class, [
            'class' => Oferta::class,
            'choice_label' => 'nombre',
            'required' => false,
            'placeholder' => 'Sin oferta',            
        ])
        
        ->add('guardar', SubmitType::class, array('attr' => array('class' => 'submit')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Plato'
        ));
    }


}
