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

class EntryOrderController extends FOSRestController {

    /**
     * @Rest\Post("/entryOrders")
     */
    public function addEntryOrderAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $id_provider = $data['id_provider'];
        $id_product = $data['id_product'];
        $quantity = $data['quantity'];
        $unit_value = $data['unit_value'];
        $total_value = $data['total_value'];
        $bill = $data['bill'];
        $entry_date = $data['entry_date'];
        $id_user = $data['id_user'];

        if (empty($id_provider) || empty($id_product) || empty($quantity) || empty($unit_value) || empty($total_value) || empty($bill) || empty($entry_date) || empty($id_user)) {
            return new View("No se permiten valores nulos!", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = $this->getDoctrine()->getRepository('AppBundle:Producto')->find($id_product);
        $provider = new \AppBundle\Entity\OrdenIngreso($quantity, $unit_value, $total_value, $bill, new DateTime($entry_date), $product, $this->getDoctrine()->getRepository('AppBundle:Proveedor')->find($id_provider), $this->getDoctrine()->getRepository('AppBundle:Usuario')->find($id_user));

        $em = $this->getDoctrine()->getEntityManager();
        $product->setProdStock(($product->getProdStock()) + $quantity);
        $product->setprodPrecioUnitario($unit_value);
        $product->setprodPrecioTotal(($product->getProdPrecioTotal()) + $total_value);

        $em->persist($product);
        $em->persist($provider);
        $em->flush();

        return new View("Registro creado correctamente", Response::HTTP_CREATED);
    }

}
