<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdenEgreso
 *
 * @ORM\Table(name="orden_egreso", uniqueConstraints={@ORM\UniqueConstraint(name="us_id_usuario", columns={"us_id_usuario"})}, indexes={@ORM\Index(name="cl_id_cliente", columns={"cl_id_cliente"}), @ORM\Index(name="prod_id_producto", columns={"prod_id_producto"}), @ORM\Index(name="lp_id_localidad", columns={"lp_id_localidad"}), @ORM\Index(name="sp_id_solicitud", columns={"sp_id_solicitud"})})
 * @ORM\Entity
 */
class OrdenEgreso
{    
    /**
     * @var integer
     *
     * @ORM\Column(name="oe_id_egreso", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oeIdEgreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="oe_cantidad", type="integer", nullable=false)
     */
    private $oeCantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="oe_valor_unitario", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $oeValorUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="oe_valor_total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $oeValorTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="oe_fecha_egreso", type="integer", nullable=false)
     */
    private $oeFechaEgreso;

    /**
     * @var \AppBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cl_id_cliente", referencedColumnName="cl_id_cliente")
     * })
     */
    private $clCliente;

    /**
     * @var \AppBundle\Entity\LocalidadProducto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LocalidadProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lp_id_localidad", referencedColumnName="lp_id_localidad")
     * })
     */
    private $lpLocalidad;

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
     * @var \AppBundle\Entity\SolicitudProducto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SolicitudProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sp_id_solicitud", referencedColumnName="sp_id_solicitud")
     * })
     */
    private $spSolicitud;

    /**
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="us_id_usuario", referencedColumnName="us_id_usuario")
     * })
     */
    private $usUsuario;

    function __construct($oeIdEgreso, $oeCantidad, $oeValorUnitario, $oeValorTotal, $oeFechaEgreso, \AppBundle\Entity\Cliente $clCliente, \AppBundle\Entity\LocalidadProducto $lpLocalidad, \AppBundle\Entity\Producto $prodProducto, \AppBundle\Entity\SolicitudProducto $spSolicitud, \AppBundle\Entity\Usuario $usUsuario) {
        $this->oeIdEgreso = $oeIdEgreso;
        $this->oeCantidad = $oeCantidad;
        $this->oeValorUnitario = $oeValorUnitario;
        $this->oeValorTotal = $oeValorTotal;
        $this->oeFechaEgreso = $oeFechaEgreso;
        $this->clCliente = $clCliente;
        $this->lpLocalidad = $lpLocalidad;
        $this->prodProducto = $prodProducto;
        $this->spSolicitud = $spSolicitud;
        $this->usUsuario = $usUsuario;
    }
    
      function getOeIdEgreso() {
        return $this->oeIdEgreso;
    }

    function getOeCantidad() {
        return $this->oeCantidad;
    }

    function getOeValorUnitario() {
        return $this->oeValorUnitario;
    }

    function getOeValorTotal() {
        return $this->oeValorTotal;
    }

    function getOeFechaEgreso() {
        return $this->oeFechaEgreso;
    }

    function getClCliente(): \AppBundle\Entity\Cliente {
        return $this->clCliente;
    }

    function getLpLocalidad(): \AppBundle\Entity\LocalidadProducto {
        return $this->lpLocalidad;
    }

    function getProdProducto(): \AppBundle\Entity\Producto {
        return $this->prodProducto;
    }

    function getSpSolicitud(): \AppBundle\Entity\SolicitudProducto {
        return $this->spSolicitud;
    }

    function getUsUsuario(): \AppBundle\Entity\Usuario {
        return $this->usUsuario;
    }

    function setOeIdEgreso($oeIdEgreso) {
        $this->oeIdEgreso = $oeIdEgreso;
    }

    function setOeCantidad($oeCantidad) {
        $this->oeCantidad = $oeCantidad;
    }

    function setOeValorUnitario($oeValorUnitario) {
        $this->oeValorUnitario = $oeValorUnitario;
    }

    function setOeValorTotal($oeValorTotal) {
        $this->oeValorTotal = $oeValorTotal;
    }

    function setOeFechaEgreso($oeFechaEgreso) {
        $this->oeFechaEgreso = $oeFechaEgreso;
    }

    function setClCliente(\AppBundle\Entity\Cliente $clCliente) {
        $this->clCliente = $clCliente;
    }

    function setLpLocalidad(\AppBundle\Entity\LocalidadProducto $lpLocalidad) {
        $this->lpLocalidad = $lpLocalidad;
    }

    function setProdProducto(\AppBundle\Entity\Producto $prodProducto) {
        $this->prodProducto = $prodProducto;
    }

    function setSpSolicitud(\AppBundle\Entity\SolicitudProducto $spSolicitud) {
        $this->spSolicitud = $spSolicitud;
    }

    function setUsUsuario(\AppBundle\Entity\Usuario $usUsuario) {
        $this->usUsuario = $usUsuario;
    }

  

}

