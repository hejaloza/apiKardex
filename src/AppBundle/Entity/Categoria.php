<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity
 */
class Categoria
{    
    /**
     * @var integer
     *
     * @ORM\Column(name="ca_id_categoria", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $caIdCategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="ca_cod_categoria", type="integer", nullable=false)
     */
    private $caCodCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="ca_descripcion", type="string", length=100, nullable=false)
     */
    private $caDescripcion;


    function __construct($caCodCategoria, $caDescripcion) {
      //  $this->caIdCategoria = $caIdCategoria;
        $this->caCodCategoria = $caCodCategoria;
        $this->caDescripcion = $caDescripcion;
    }
    
    function getCaIdCategoria() {
        return $this->caIdCategoria;
    }

    function getCaCodCategoria() {
        return $this->caCodCategoria;
    }

    function getCaDescripcion() {
        return $this->caDescripcion;
    }

    function setCaIdCategoria($caIdCategoria) {
        $this->caIdCategoria = $caIdCategoria;
    }

    function setCaCodCategoria($caCodCategoria) {
        $this->caCodCategoria = $caCodCategoria;
    }

    function setCaDescripcion($caDescripcion) {
        $this->caDescripcion = $caDescripcion;
    }
}

