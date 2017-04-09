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

class ProductController extends FOSRestController {
    
    /**
     * @Rest\Get("/products")
     */
    public function getAllProductsAction() {
        $products = $this->getDoctrine()->getRepository('AppBundle:Producto')->findAll();
        if (empty($products) || $products === null) {
            return new View("No existen registros", Response::HTTP_NOT_FOUND);
        }
        return $products;
    }

    /**
     * @Rest\Get("/products/{id_product}")
     */
    public function getProductByIdAction(Request $request) {
        $id_product = $request->get('id_product');
        $product = $this->getDoctrine()->getRepository('AppBundle:Producto')->find($id_product);
        if (empty($product) || $product === null) {
            return new View("No existe registro con ese Id", Response::HTTP_NOT_FOUND);
        }
        return $product;
    }

    /**
     * @Rest\Get("/productsByName/{name}")
     */
    public function getProductByNameAction(Request $request) {
        $product_name = $request->get('name');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
        $query = $repository->createQueryBuilder('p')
                ->where('p.prodNombre LIKE :word')
                ->setParameter('word', '%' . $product_name . '%')
                ->getQuery();
        $product = $query->getResult();

        if (empty($product) || $product === null) {
            return new View("No existe registro con ese nombre", Response::HTTP_NOT_FOUND);
        }
        return $product;
    }

    /**
     * @Rest\Get("/productsByCode/{code}")
     */
    public function getProductByCodeAction(Request $request) {
        $product_code = $request->get('code');
        $product = $this->getDoctrine()->getRepository('AppBundle:Producto')->findOneBy(array('prodCodigo' => $product_code));
        if (empty($product) || $product === null) {
            return new View("No existe registro con ese codigo", Response::HTTP_NOT_FOUND);
        }
        return $product;
    }

    /**
     * @Rest\Post("/products")
     */
    public function addProductAction(Request $request) {

        $data = json_decode($request->getContent(), true);

        $nombre = $data['prod_nombre'];
        $detalle = $data['prod_detalle'];
        $codigo = $data['prod_codigo'];
        $estado = $data['prod_estado'];
        $stock = $data['prod_stock'];
        $precio_unitario = $data['prod_precio_unitario'];
        $precio_total = $data['prod_precio_total'];
        $fecha_ingreso = $data['prod_fecha_ingreso'];
        $id_categoria = ($data['ca_categoria']);
        $id_unidad = $data['um_unidad'];
        $id_usuario = $data['us_usuario'];


        if (empty($nombre) || empty($detalle) || empty($codigo) || empty($estado) || empty($fecha_ingreso) || empty($id_categoria) || empty($id_unidad) || empty($id_usuario)) {
            return new View("Valores nulos no se permiten", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = new \AppBundle\Entity\Producto($nombre, $detalle, $codigo, $estado, $stock, $precio_unitario, $precio_total, new DateTime($fecha_ingreso), $this->getDoctrine()->getRepository('AppBundle:Categoria')->find($id_categoria), $this->getDoctrine()->getRepository('AppBundle:UnidadMedida')->find($id_unidad), $this->getDoctrine()->getRepository('AppBundle:Usuario')->find($id_usuario));

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();

        return new View("Registro creado correctamente", Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/products/{productId}")
     */
    public function updateProductAction(Request $request) {

        $data = json_decode($request->getContent(), true);
        $nombre = $data['prod_nombre'];
        $detalle = $data['prod_detalle'];
        $codigo = $data['prod_codigo'];
        $estado = $data['prod_estado'];
        $stock = $data['prod_stock'];
        $precio_unitario = $data['prod_precio_unitario'];
        $precio_total = $data['prod_precio_total'];
        $fecha_ingreso = $data['prod_fecha_ingreso'];
        $id_categoria = $data['ca_categoria'];
        $id_unidad = $data['um_unidad'];

        $em = $this->getDoctrine()->getEntityManager();
        $productId = $request->get('productId');
        $product = $this->getDoctrine()->getRepository('AppBundle:Producto')->find($productId);
        if (empty($product)) {
            return new View("Registro no encontrado", Response::HTTP_NOT_FOUND);
        } elseif (!empty($id_categoria) && !empty($id_unidad)) {
            $product->setProdNombre($nombre);
            $product->setProdDetalle($detalle);
            $product->setProdCodigo($codigo);
            $product->setProdEstado($estado);
            $product->setProdStock($stock);
            $product->setProdPrecioUnitario($precio_unitario);
            $product->setProdPrecioTotal($precio_total);
            $product->setProdFechaIngreso(new DateTime($fecha_ingreso));
            $product->setCaCategoria($this->getDoctrine()->getRepository('AppBundle:Categoria')->find($id_categoria));
            $product->setUmUnidad($this->getDoctrine()->getRepository('AppBundle:UnidadMedida')->find($id_unidad));
            $em->persist($product);
            $em->flush();
            return new View("Registro actualizado correctamente", Response::HTTP_OK);
        } else {
            return new View("Categoria o Medida de Unidad no deben ser nulos", Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * @Rest\Delete("/products/{productId}")
     */
    public function deleteProductAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $productId = $request->get('productId');
        $product = $this->getDoctrine()->getRepository('AppBundle:Producto')->find($productId);
        $orden_ingreso = $this->getDoctrine()->getRepository('AppBundle:OrdenIngreso')->findOneBy(array('prodProducto' => $productId));
        $orden_egreso = $this->getDoctrine()->getRepository('AppBundle:OrdenEgreso')->findOneBy(array('prodProducto' => $productId));
        $solicitud_producto = $this->getDoctrine()->getRepository('AppBundle:SolicitudProducto')->findOneBy(array('prodProducto' => $productId));

        if (empty($product)) {
            return new View("Registro no encontrado", Response::HTTP_NOT_FOUND);
        } elseif (!empty($orden_ingreso) || !empty($orden_egreso) || !empty($solicitud_producto)) {
            return new View("El Registro no puede ser eliminado, esta relacionado con otras tablas", Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $em->remove($product);
            $em->flush();
            return new View("Registro borrado correctamente", Response::HTTP_NO_CONTENT);
        }
    }

}
