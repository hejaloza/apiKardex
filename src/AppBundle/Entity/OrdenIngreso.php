<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdenIngreso
 *
 * @ORM\Table(name="orden_ingreso", indexes={@ORM\Index(name="pr_id_proveedor", columns={"pr_id_proveedor"}), @ORM\Index(name="prod_id_producto", columns={"prod_id_producto"}), @ORM\Index(name="us_id_usuario", columns={"us_id_usuario"})})
 * @ORM\Entity
 */
class OrdenIngreso
{   
    /**
     * @var integer
     *
     * @ORM\Column(name="oi_id_ingreso", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oiIdIngreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="oi_cantidad", type="integer", nullable=false)
     */
    private $oiCantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="oi_valor_unitario", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $oiValorUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="oi_valor_total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $oiValorTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="oi_factura", type="string", length=200, nullable=false)
     */
    private $oiFactura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="oi_fecha_ingreso", type="datetime", nullable=false)
     */
    private $oiFechaIngreso;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prod_id_producto", referencedColumnName="prod_id_producto")
     * })
     */
    private $prodProducto;

    /**
     * @var \AppBundle\Entity\Proveedor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pr_id_proveedor", referencedColumnName="pr_id_proveedor")
     * })
     */
    private $prProveedor;

    /**
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="us_id_usuario", referencedColumnName="us_id_usuario")
     * })
     */
    private $usUsuario;


     function __construct($oiCantidad, $oiValorUnitario, $oiValorTotal, $oiFactura, \DateTime $oiFechaIngreso, \AppBundle\Entity\Producto $prodProducto, \AppBundle\Entity\Proveedor $prProveedor, \AppBundle\Entity\Usuario $usUsuario) {
        //$this->oiIdIngreso = $oiIdIngreso;
        $this->oiCantidad = $oiCantidad;
        $this->oiValorUnitario = $oiValorUnitario;
        $this->oiValorTotal = $oiValorTotal;
        $this->oiFactura = $oiFactura;
        $this->oiFechaIngreso = $oiFechaIngreso;
        $this->prodProducto = $prodProducto;
        $this->prProveedor = $prProveedor;
        $this->usUsuario = $usUsuario;
    }

     function getOiIdIngreso() {
        return $this->oiIdIngreso;
    }

    function getOiCantidad() {
        return $this->oiCantidad;
    }

    function getOiValorUnitario() {
        return $this->oiValorUnitario;
    }

    function getOiValorTotal() {
        return $this->oiValorTotal;
    }

    function getOiFactura() {
        return $this->oiFactura;
    }

    function getOiFechaIngreso(): \DateTime {
        return $this->oiFechaIngreso;
    }

    function getProdProducto(): \AppBundle\Entity\Producto {
        return $this->prodProducto;
    }

    function getPrProveedor(): \AppBundle\Entity\Proveedor {
        return $this->prProveedor;
    }

    function getUsUsuario(): \AppBundle\Entity\Usuario {
        return $this->usUsuario;
    }

    function setOiIdIngreso($oiIdIngreso) {
        $this->oiIdIngreso = $oiIdIngreso;
    }

    function setOiCantidad($oiCantidad) {
        $this->oiCantidad = $oiCantidad;
    }

    function setOiValorUnitario($oiValorUnitario) {
        $this->oiValorUnitario = $oiValorUnitario;
    }

    function setOiValorTotal($oiValorTotal) {
        $this->oiValorTotal = $oiValorTotal;
    }

    function setOiFactura($oiFactura) {
        $this->oiFactura = $oiFactura;
    }

    function setOiFechaIngreso(\DateTime $oiFechaIngreso) {
        $this->oiFechaIngreso = $oiFechaIngreso;
    }

    function setProdProducto(\AppBundle\Entity\Producto $prodProducto) {
        $this->prodProducto = $prodProducto;
    }

    function setPrProveedor(\AppBundle\Entity\Proveedor $prProveedor) {
        $this->prProveedor = $prProveedor;
    }

    function setUsUsuario(\AppBundle\Entity\Usuario $usUsuario) {
        $this->usUsuario = $usUsuario;
    }

    
    
}

