<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Article;
use PrincipalBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class FormatController extends Controller
{
   // private $session;

   // public function __construct(){
   // $this->session=new Session();
   // }

   public function addFormatAction(Request $request){
       $f=new Article();
       $form=$this->createForm(ArticleType::class,$f);
       $form->handleRequest($request);

       if($form->isSubmitted()){
           if($form->isValid()){
               $em=$this->getDoctrine()->getEntityManager();
               $em->persist($f);
               $flush=$em->flush();
               if($flush==null){
                   $status="Información agregada correctamente.";
                   //$this->session->getFlashBag()->add("status",$status);
                   return$this->redirectToRoute("addFormat");
                  
               }
               else{
                   $status="Información no agregada";
                   //$this->session->getFlashBag()->add("status",$status);
               }
           }
       }

       return $this->render("PrincipalBundle:Format:addFormat.html.twig",
       array("form"=>$form->createView()));
   }

   public function listAction(){
    $em=$this->getDoctrine()->getEntityManager();
    $lists=$em->getRepository("PrincipalBundle:Article")->findAll();

    return$this->render("PrincipalBundle:Format:listFormat.html.twig",
      array("lists"=>$lists)); 
   }

   public function deleteListAction($id){
    $em=$this->getDoctrine()->getEntityManager();
    $list=$em->getRepository("PrincipalBundle:Article")->find($id);
    $em->remove($list);
    $flush=$em->flush();
    if($flush==null){
        $status="Registro eliminado.";
        //$this->session->getFlashBag()->add("status",$status);
        return$this->redirectToRoute('listFormat');
        
    }
    else{
        $status="Registro no eliminado";
        //$this->session->getFlashBag()->add("status",$status);
        return $this->redirectToRute('listFormat');
         }
   }
   
   public function editListAction(Request $request,$id){
    $em=$this->getDoctrine()->getEntityManager();
    $f=$em->getRepository("PrincipalBundle:Article")->find($id);
    $form=$this->createForm(ArticleType::class,$f);
    $form->handleRequest($request);

    if($form->isSubmitted())
    {
           if($form->isValid()){
               $em=$this->getDoctrine()->getEntityManager();
               $f->setCode($form->get("code")->getData());
               $f->setName($form->get("name")->getData());
               $f->setDescription($form->get("description")->getData());
               $f->setBrand($form->get("brand")->getData());
               $f->setCategory($form->get("category")->getData());
               $f->setPrice($form->get("price")->getData());

               $em->persist($f);
               $flush=$em->flush();
               if($flush==null){
                   $status="Información editada correctamente.";
                   //$this->session->getFlashBag()->add("status",$status);
                   return$this->redirectToRoute("addFormat");
                  
               }
               else{
                   $status="Información editada agregada";
                   //$this->session->getFlashBag()->add("status",$status);
               }
            
           }
        }
       return $this->render("PrincipalBundle:Format:editFormat.html.twig",
       array("form"=>$form->createView()));
    }
}
