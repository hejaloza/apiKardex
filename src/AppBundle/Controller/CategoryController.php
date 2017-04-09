<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class CategoryController extends FOSRestController {

    /**
     * @Rest\Get("/categories")
     */
    public function getAllCategoriesAction() {
        $categories = $this->getDoctrine()->getRepository('AppBundle:Categoria')->findAll();
        if ($categories === null) {
            return new View("No existen registros", Response::HTTP_NOT_FOUND);
        }
        return $categories;
    }

    /**
     * @Rest\Post("/categories")
     */
    public function addCategoryAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $category = new \AppBundle\Entity\Categoria($data['ca_cod_categoria'], $data['ca_descripcion']);
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($category);
        $em->flush();
    }

    /**
     * @Rest\Put("/categories/{categoryId}")
     */
    public function updateCategoryAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $categoryId = $request->get('categoryId');
        $category = $this->getDoctrine()->getRepository('AppBundle:Categoria')->find($categoryId);
 
        $category->setCaCodCategoria($data['ca_cod_categoria']);
        $category->setcaDescripcion($data['ca_descripcion']);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($category);
        $em->flush();
    }

    /**
     * @Rest\Delete("/categories/{categoryId}")
     */
    public function deleteCategoryAction(Request $request) {      
        $categoryId = $request->get('categoryId');
        $category = $this->getDoctrine()->getRepository('AppBundle:Categoria')->find($categoryId);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($category);
        $em->flush();
    }

}
