<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Category;
use PrincipalBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class CategoryController extends Controller
{
   // private $session;

   // public function __construct(){
   // $this->session=new Session();
   // }

   public function addCategoryAction(Request $request){
       $f=new Category();
       $form=$this->createForm(CategoryType::class,$f);
       $form->handleRequest($request);

       if($form->isSubmitted()){
           if($form->isValid()){
               $em=$this->getDoctrine()->getEntityManager();
               $em->persist($f);
               $flush=$em->flush();
               if($flush==null){
                   $status="Información agregada correctamente.";
                   //$this->session->getFlashBag()->add("status",$status);
                   return$this->redirectToRoute("addCategory");
                   
               }
               else{
                   $status="Información no agregada";
                   //$this->session->getFlashBag()->add("status",$status);
                
               }
           }
       }

     return $this->render("PrincipalBundle:Format:addCategory.html.twig",
     array("form"=>$form->createView()));
   }



   public function listCategoryAction(){
    $em=$this->getDoctrine()->getEntityManager();
    $lists=$em->getRepository("PrincipalBundle:Category")->findAll();

    return$this->render("PrincipalBundle:Format:listCategory.html.twig",
      array("lists"=>$lists)); 
   }

   public function deleteListCategoryAction($id){
    $em=$this->getDoctrine()->getEntityManager();
    $list=$em->getRepository("PrincipalBundle:Category")->find($id);
    $em->remove($list);
    $flush=$em->flush();
    if($flush==null){
        $status="Registro eliminado.";
        //$this->session->getFlashBag()->add("status",$status);
        return$this->redirectToRoute('listCategory');
        
    }
    else{
        $status="Registro no eliminado";
        //$this->session->getFlashBag()->add("status",$status);
        return $this->redirectToRute('listCategory');
    }
   }

   public function editListCategoryAction(Request $request,$id){
    $em=$this->getDoctrine()->getEntityManager();
    $f=$em->getRepository("PrincipalBundle:Category")->find($id);
    $form=$this->createForm(CategoryType::class,$f);
    $form->handleRequest($request);

    if($form->isSubmitted())
    {
           if($form->isValid()){
               $em=$this->getDoctrine()->getEntityManager();
               $f->setCode($form->get("code")->getData());
               $f->setName($form->get("name")->getData());
               $f->setDescription($form->get("description")->getData());
               $f->setState($form->get("state")->getData());

               $em->persist($f);
               $flush=$em->flush();
               if($flush==null){
                   $status="Información editada correctamente.";
                   //$this->session->getFlashBag()->add("status",$status);
                   return$this->redirectToRoute("listCategory");
                  
               }
               else{
                   $status="Información editada agregada";
                   //$this->session->getFlashBag()->add("status",$status);
               }
            
           }
        }
       return $this->render("PrincipalBundle:Format:editCategory.html.twig",
       array("form"=>$form->createView()));
    }
}
