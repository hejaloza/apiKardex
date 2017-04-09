<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class MeasureUnitController extends FOSRestController {

    /**
     * @Rest\Get("/measures")
     */
    public function getAllMeasuresAction() {
        $measures = $this->getDoctrine()->getRepository('AppBundle:UnidadMedida')->findAll();
        if (empty($measures) || $measures === null) {
            return new View("No existen registros", Response::HTTP_NOT_FOUND);
        }
        return $measures;
    }

}
