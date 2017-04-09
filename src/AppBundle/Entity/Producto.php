<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", indexes={@ORM\Index(name="ca_id_categoria", columns={"ca_id_categoria"}), @ORM\Index(name="um_id_unidad", columns={"um_id_unidad"}), @ORM\Index(name="us_id_usuario", columns={"us_id_usuario"})})
 * @ORM\Entity
 */
class Producto
{   
    /**
     * @var integer
     *
     * @ORM\Column(name="prod_id_producto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prodIdProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_nombre", type="string", length=200, nullable=false)
     */
    private $prodNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_detalle", type="string", length=200, nullable=false)
     */
    private $prodDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_codigo", type="string", length=100, nullable=false)
     */
    private $prodCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_estado", type="string", length=50, nullable=false)
     */
    private $prodEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_stock", type="integer", nullable=false)
     */
    private $prodStock;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_precio_unitario", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prodPrecioUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_precio_total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prodPrecioTotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prod_fecha_ingreso", type="datetime", nullable=false)
     */
    private $prodFechaIngreso;

    /**
     * @var \AppBundle\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ca_id_categoria", referencedColumnName="ca_id_categoria")
     * })
     */
    private $caCategoria;

    /**
     * @var \AppBundle\Entity\UnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="um_id_unidad", referencedColumnName="um_id_unidad")
     * })
     */
    private $umUnidad;

    /**
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="us_id_usuario", referencedColumnName="us_id_usuario")
     * })
     */
    private $usUsuario;


    function __construct($prodNombre, $prodDetalle, $prodCodigo, $prodEstado, $prodStock, $prodPrecioUnitario, $prodPrecioTotal, \DateTime $prodFechaIngreso, \AppBundle\Entity\Categoria $caCategoria, \AppBundle\Entity\UnidadMedida $umUnidad, \AppBundle\Entity\Usuario $usUsuario) {
        //$this->prodIdProducto = $prodIdProducto;
        $this->prodNombre = $prodNombre;
        $this->prodDetalle = $prodDetalle;
        $this->prodCodigo = $prodCodigo;
        $this->prodEstado = $prodEstado;
        $this->prodStock = $prodStock;
        $this->prodPrecioUnitario = $prodPrecioUnitario;
        $this->prodPrecioTotal = $prodPrecioTotal;
        $this->prodFechaIngreso = $prodFechaIngreso;
        $this->caCategoria = $caCategoria;
        $this->umUnidad = $umUnidad;
        $this->usUsuario = $usUsuario;
    }
    
       function getProdIdProducto() {
        return $this->prodIdProducto;
    }

    function getProdNombre() {
        return $this->prodNombre;
    }

    function getProdDetalle() {
        return $this->prodDetalle;
    }

    function getProdCodigo() {
        return $this->prodCodigo;
    }

    function getProdEstado() {
        return $this->prodEstado;
    }

    function getProdStock() {
        return $this->prodStock;
    }

    function getProdPrecioUnitario() {
        return $this->prodPrecioUnitario;
    }

    function getProdPrecioTotal() {
        return $this->prodPrecioTotal;
    }

    function getProdFechaIngreso(): \DateTime {
        return $this->prodFechaIngreso;
    }

    function getCaCategoria(): \AppBundle\Entity\Categoria {
        return $this->caCategoria;
    }

    function getUmUnidad(): \AppBundle\Entity\UnidadMedida {
        return $this->umUnidad;
    }

    function getUsUsuario(): \AppBundle\Entity\Usuario {
        return $this->usUsuario;
    }

    function setProdIdProducto($prodIdProducto) {
        $this->prodIdProducto = $prodIdProducto;
    }

    function setProdNombre($prodNombre) {
        $this->prodNombre = $prodNombre;
    }

    function setProdDetalle($prodDetalle) {
        $this->prodDetalle = $prodDetalle;
    }

    function setProdCodigo($prodCodigo) {
        $this->prodCodigo = $prodCodigo;
    }

    function setProdEstado($prodEstado) {
        $this->prodEstado = $prodEstado;
    }

    function setProdStock($prodStock) {
        $this->prodStock = $prodStock;
    }

    function setProdPrecioUnitario($prodPrecioUnitario) {
        $this->prodPrecioUnitario = $prodPrecioUnitario;
    }

    function setProdPrecioTotal($prodPrecioTotal) {
        $this->prodPrecioTotal = $prodPrecioTotal;
    }

    function setProdFechaIngreso(\DateTime $prodFechaIngreso) {
        $this->prodFechaIngreso = $prodFechaIngreso;
    }

    function setCaCategoria(\AppBundle\Entity\Categoria $caCategoria) {
        $this->caCategoria = $caCategoria;
    }

    function setUmUnidad(\AppBundle\Entity\UnidadMedida $umUnidad) {
        $this->umUnidad = $umUnidad;
    }

    function setUsUsuario(\AppBundle\Entity\Usuario $usUsuario) {
        $this->usUsuario = $usUsuario;
    }

  
}

