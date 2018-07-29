<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('code',TextType::class,array("label"=>"Codigo:","required"=>"required",
        "attr"=>array("class"=>"form-control")))
        ->add('name',TextType::class,array("label"=>"Nombre:","required"=>"required",
        "attr"=>array("class"=>"form-control")))
        ->add('description',TextType::class,array("label"=>"Descripción:","required"=>"required",
        "attr"=>array("class"=>"form-control")))

        // ->add('state',ChoiceType::class,
        // array("label"=>"Estado","required"=>"required","attr"=>array("class"=>"form-control")))

        ->add('state',ChoiceType::class,array('choices'  => array('Activo' => true,'Inactivo' => false)),
        array("label"=>"Estado","required"=>"required","attr"=>array("class"=>"form-control")))

        ->add('Guardar',SubmitType::class,array("attr"=>array("class"=>"btn btn-info")))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_category';
    }


}
