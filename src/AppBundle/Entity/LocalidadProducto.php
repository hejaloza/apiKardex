<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocalidadProducto
 *
 * @ORM\Table(name="localidad_producto")
 * @ORM\Entity
 */
class LocalidadProducto
{        

    /**
     * @var integer
     *
     * @ORM\Column(name="lp_id_localidad", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lpIdLocalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="lp_descripcion", type="string", length=100, nullable=false)
     */
    private $lpDescripcion;


     function __construct($lpIdLocalidad, $lpDescripcion) {
        $this->lpIdLocalidad = $lpIdLocalidad;
        $this->lpDescripcion = $lpDescripcion;
    }
    
    function getLpIdLocalidad() {
        return $this->lpIdLocalidad;
    }

    function getLpDescripcion() {
        return $this->lpDescripcion;
    }

    function setLpIdLocalidad($lpIdLocalidad) {
        $this->lpIdLocalidad = $lpIdLocalidad;
    }

    function setLpDescripcion($lpDescripcion) {
        $this->lpDescripcion = $lpDescripcion;
    }
    
}

