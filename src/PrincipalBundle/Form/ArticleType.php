<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType;  
use Symfony\Component\Form\Extension\Core\Type\SubmitType;  
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;     
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\NumberType; 
      

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('code',TextType::class,array("label"=>"Codigo:","required"=>"required",'validation_groups' => 4,
        "attr"=>array("class"=>"form-control")))
        ->add('name',TextType::class,array("label"=>"Nombre:","required"=>"required",
        "attr"=>array("class"=>"form-control")))
        ->add('description',TextType::class,array("label"=>"Descripción:","required"=>"required",
        "attr"=>array("class"=>"form-control")))
        ->add('brand',TextType::class,array("label"=>"Marca:","required"=>"required",
        "attr"=>array("class"=>"form-control")))

        ->add('category',TextType::class,array("label"=>"Categoria: ","required"=>"required",
        "attr"=>array("class"=>"form-control")))

        // ->add('category',ChoiceType::class,array("label"=>"Categoria: ","required"=>"required",
        // "attr"=>array("class"=>"form-control")))

        ->add('price',TextType::class,array("label"=>"Precio","required"=>"required",
        "attr"=>array("class"=>"form-control")))      
        ->add('Guardar',SubmitType::class,array("attr"=>array("class"=>"btn btn-info")))
       
               
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_article';
    }


}
