<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedor
 *
 * @ORM\Table(name="proveedor")
 * @ORM\Entity
 */
class Proveedor
{      
    /**
     * @var integer
     *
     * @ORM\Column(name="pr_id_proveedor", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prIdProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_razon_social", type="string", length=150, nullable=false)
     */
    private $prRazonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_ruc", type="string", length=150, nullable=true)
     */
    private $prRuc;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_direccion", type="string", length=150, nullable=false)
     */
    private $prDireccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="pr_telefono", type="integer", nullable=false)
     */
    private $prTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_correo", type="string", length=25, nullable=false)
     */
    private $prCorreo;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_descripcion", type="string", length=200, nullable=false)
     */
    private $prDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="pr_contacto", type="string", length=50, nullable=false)
     */
    private $prContacto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pr_fecha_ingreso", type="datetime", nullable=false)
     */
    private $prFechaIngreso;


    function __construct($prIdProveedor, $prRazonSocial, $prRuc, $prDireccion, $prTelefono, $prCorreo, $prDescripcion, $prContacto, \DateTime $prFechaIngreso) {
        $this->prIdProveedor = $prIdProveedor;
        $this->prRazonSocial = $prRazonSocial;
        $this->prRuc = $prRuc;
        $this->prDireccion = $prDireccion;
        $this->prTelefono = $prTelefono;
        $this->prCorreo = $prCorreo;
        $this->prDescripcion = $prDescripcion;
        $this->prContacto = $prContacto;
        $this->prFechaIngreso = $prFechaIngreso;
    }

      function getPrIdProveedor() {
        return $this->prIdProveedor;
    }

    function getPrRazonSocial() {
        return $this->prRazonSocial;
    }

    function getPrRuc() {
        return $this->prRuc;
    }

    function getPrDireccion() {
        return $this->prDireccion;
    }

    function getPrTelefono() {
        return $this->prTelefono;
    }

    function getPrCorreo() {
        return $this->prCorreo;
    }

    function getPrDescripcion() {
        return $this->prDescripcion;
    }

    function getPrContacto() {
        return $this->prContacto;
    }

    function getPrFechaIngreso(): \DateTime {
        return $this->prFechaIngreso;
    }

    function setPrIdProveedor($prIdProveedor) {
        $this->prIdProveedor = $prIdProveedor;
    }

    function setPrRazonSocial($prRazonSocial) {
        $this->prRazonSocial = $prRazonSocial;
    }

    function setPrRuc($prRuc) {
        $this->prRuc = $prRuc;
    }

    function setPrDireccion($prDireccion) {
        $this->prDireccion = $prDireccion;
    }

    function setPrTelefono($prTelefono) {
        $this->prTelefono = $prTelefono;
    }

    function setPrCorreo($prCorreo) {
        $this->prCorreo = $prCorreo;
    }

    function setPrDescripcion($prDescripcion) {
        $this->prDescripcion = $prDescripcion;
    }

    function setPrContacto($prContacto) {
        $this->prContacto = $prContacto;
    }

    function setPrFechaIngreso(\DateTime $prFechaIngreso) {
        $this->prFechaIngreso = $prFechaIngreso;
    }

}

