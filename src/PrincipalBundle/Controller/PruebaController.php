<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PruebaController extends Controller
{
    public function indexAction()
    {
        return $this->render('PrincipalBundle:Default:index.html.twig');
    }

    public function muestraAction(){
        return $this->render('PrincipalBundle:Prueba:uno.html.twig',
        array('name'=>'Ricardo urrego'));

    }
}
