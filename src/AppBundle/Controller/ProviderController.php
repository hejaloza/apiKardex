<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use DateTime;

class ProviderController extends FOSRestController {
    
    /**
     * @Rest\Get("/providers")
     */
    public function getAllProvidersAction() {
        $providers = $this->getDoctrine()->getRepository('AppBundle:Proveedor')->findAll();
        if (empty($providers) || $providers === null) {
            return new View("No existen registros", Response::HTTP_NOT_FOUND);
        }
        return $providers;
    }

  

}
