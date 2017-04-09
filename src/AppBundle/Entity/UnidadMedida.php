<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnidadMedida
 *
 * @ORM\Table(name="unidad_medida")
 * @ORM\Entity
 */
class UnidadMedida
{  
    /**
     * @var integer
     *
     * @ORM\Column(name="um_id_unidad", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $umIdUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="um_abreviatura", type="string", length=25, nullable=false)
     */
    private $umAbreviatura;

    /**
     * @var string
     *
     * @ORM\Column(name="um_descripcion", type="string", length=25, nullable=false)
     */
    private $umDescripcion;


     function __construct($umIdUnidad, $umAbreviatura, $umDescripcion) {
        $this->umIdUnidad = $umIdUnidad;
        $this->umAbreviatura = $umAbreviatura;
        $this->umDescripcion = $umDescripcion;
    }
    
      function getUmIdUnidad() {
        return $this->umIdUnidad;
    }

    function getUmAbreviatura() {
        return $this->umAbreviatura;
    }

    function getUmDescripcion() {
        return $this->umDescripcion;
    }

    function setUmIdUnidad($umIdUnidad) {
        $this->umIdUnidad = $umIdUnidad;
    }

    function setUmAbreviatura($umAbreviatura) {
        $this->umAbreviatura = $umAbreviatura;
    }

    function setUmDescripcion($umDescripcion) {
        $this->umDescripcion = $umDescripcion;
    }

    
    
}

