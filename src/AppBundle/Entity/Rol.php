<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol
{      
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rol", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRol;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_rol", type="string", length=100, nullable=false)
     */
    private $tipoRol;


    function __construct($idRol, $tipoRol) {
        $this->idRol = $idRol;
        $this->tipoRol = $tipoRol;
    }
    
      function getIdRol() {
        return $this->idRol;
    }

    function getTipoRol() {
        return $this->tipoRol;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setTipoRol($tipoRol) {
        $this->tipoRol = $tipoRol;
    }

}

