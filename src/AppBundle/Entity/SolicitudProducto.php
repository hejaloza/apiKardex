<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudProducto
 *
 * @ORM\Table(name="solicitud_producto", indexes={@ORM\Index(name="prod_id_producto", columns={"prod_id_producto"}), @ORM\Index(name="lp_id_localidad", columns={"lp_id_localidad"}), @ORM\Index(name="us_id_usuario", columns={"us_id_usuario"})})
 * @ORM\Entity
 */
class SolicitudProducto
{  
    /**
     * @var integer
     *
     * @ORM\Column(name="sp_id_solicitud", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spIdSolicitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="sp_cantidad", type="integer", nullable=false)
     */
    private $spCantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="sp_estado", type="string", length=100, nullable=false)
     */
    private $spEstado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sp_fecha_solicitud", type="datetime", nullable=false)
     */
    private $spFechaSolicitud;

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
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="us_id_usuario", referencedColumnName="us_id_usuario")
     * })
     */
    private $usUsuario;


      function __construct($spIdSolicitud, $spCantidad, $spEstado, \DateTime $spFechaSolicitud, \AppBundle\Entity\LocalidadProducto $lpLocalidad, \AppBundle\Entity\Producto $prodProducto, \AppBundle\Entity\Usuario $usUsuario) {
        $this->spIdSolicitud = $spIdSolicitud;
        $this->spCantidad = $spCantidad;
        $this->spEstado = $spEstado;
        $this->spFechaSolicitud = $spFechaSolicitud;
        $this->lpLocalidad = $lpLocalidad;
        $this->prodProducto = $prodProducto;
        $this->usUsuario = $usUsuario;
    }
    
      function getSpIdSolicitud() {
        return $this->spIdSolicitud;
    }

    function getSpCantidad() {
        return $this->spCantidad;
    }

    function getSpEstado() {
        return $this->spEstado;
    }

    function getSpFechaSolicitud(): \DateTime {
        return $this->spFechaSolicitud;
    }

    function getLpLocalidad(): \AppBundle\Entity\LocalidadProducto {
        return $this->lpLocalidad;
    }

    function getProdProducto(): \AppBundle\Entity\Producto {
        return $this->prodProducto;
    }

    function getUsUsuario(): \AppBundle\Entity\Usuario {
        return $this->usUsuario;
    }

    function setSpIdSolicitud($spIdSolicitud) {
        $this->spIdSolicitud = $spIdSolicitud;
    }

    function setSpCantidad($spCantidad) {
        $this->spCantidad = $spCantidad;
    }

    function setSpEstado($spEstado) {
        $this->spEstado = $spEstado;
    }

    function setSpFechaSolicitud(\DateTime $spFechaSolicitud) {
        $this->spFechaSolicitud = $spFechaSolicitud;
    }

    function setLpLocalidad(\AppBundle\Entity\LocalidadProducto $lpLocalidad) {
        $this->lpLocalidad = $lpLocalidad;
    }

    function setProdProducto(\AppBundle\Entity\Producto $prodProducto) {
        $this->prodProducto = $prodProducto;
    }

    function setUsUsuario(\AppBundle\Entity\Usuario $usUsuario) {
        $this->usUsuario = $usUsuario;
    }

    
}

