<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente
{     
    /**
     * @var integer
     *
     * @ORM\Column(name="cl_id_cliente", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clIdCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_dni", type="string", length=50, nullable=false)
     */
    private $clDni;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_nombre", type="string", length=100, nullable=false)
     */
    private $clNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_apellido", type="string", length=100, nullable=false)
     */
    private $clApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_direccion", type="string", length=100, nullable=false)
     */
    private $clDireccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="cl_telefono", type="integer", nullable=false)
     */
    private $clTelefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="cl_ruc", type="integer", nullable=false)
     */
    private $clRuc;

    /**
     * @var integer
     *
     * @ORM\Column(name="cl_fecha_ingreso", type="integer", nullable=false)
     */
    private $clFechaIngreso;

    function __construct($clIdCliente, $clDni, $clNombre, $clApellido, $clDireccion, $clTelefono, $clRuc, $clFechaIngreso) {
        $this->clIdCliente = $clIdCliente;
        $this->clDni = $clDni;
        $this->clNombre = $clNombre;
        $this->clApellido = $clApellido;
        $this->clDireccion = $clDireccion;
        $this->clTelefono = $clTelefono;
        $this->clRuc = $clRuc;
        $this->clFechaIngreso = $clFechaIngreso;
    }

       function getClIdCliente() {
        return $this->clIdCliente;
    }

    function getClDni() {
        return $this->clDni;
    }

    function getClNombre() {
        return $this->clNombre;
    }

    function getClApellido() {
        return $this->clApellido;
    }

    function getClDireccion() {
        return $this->clDireccion;
    }

    function getClTelefono() {
        return $this->clTelefono;
    }

    function getClRuc() {
        return $this->clRuc;
    }

    function getClFechaIngreso() {
        return $this->clFechaIngreso;
    }

    function setClIdCliente($clIdCliente) {
        $this->clIdCliente = $clIdCliente;
    }

    function setClDni($clDni) {
        $this->clDni = $clDni;
    }

    function setClNombre($clNombre) {
        $this->clNombre = $clNombre;
    }

    function setClApellido($clApellido) {
        $this->clApellido = $clApellido;
    }

    function setClDireccion($clDireccion) {
        $this->clDireccion = $clDireccion;
    }

    function setClTelefono($clTelefono) {
        $this->clTelefono = $clTelefono;
    }

    function setClRuc($clRuc) {
        $this->clRuc = $clRuc;
    }

    function setClFechaIngreso($clFechaIngreso) {
        $this->clFechaIngreso = $clFechaIngreso;
    }

}

