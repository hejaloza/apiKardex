<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="id_rol", columns={"id_rol"})})
 * @ORM\Entity
 */
class Usuario implements UserInterface {

    /**
     * @var integer
     *
     * @ORM\Column(name="us_id_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usIdUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="us_username", type="string", length=50, nullable=false)
     */
    private $usUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="us_password", type="string", length=50, nullable=false)
     */
    private $usPassword;

    /**
     * @var \AppBundle\Entity\Rol
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id_rol")
     * })
     */
    private $idRol;

    function __construct($usIdUsuario, $usUsername, $usPassword, \AppBundle\Entity\Rol $idRol) {
        $this->usIdUsuario = $usIdUsuario;
        $this->usUsername = $usUsername;
        $this->usPassword = $usPassword;
        $this->idRol = $idRol;
    }

    function getUsIdUsuario() {
        return $this->usIdUsuario;
    }

    function getUsUsername() {
        return $this->usUsername;
    }

    function getUsPassword() {
        return $this->usPassword;
    }

    function getIdRol(): \AppBundle\Entity\Rol {
        return $this->idRol;
    }

    function setUsIdUsuario($usIdUsuario) {
        $this->usIdUsuario = $usIdUsuario;
    }

    function setUsUsername($usUsername) {
        $this->usUsername = $usUsername;
    }

    function setUsPassword($usPassword) {
        $this->usPassword = $usPassword;
    }

    function setIdRol(\AppBundle\Entity\Rol $idRol) {
        $this->idRol = $idRol;
    }

    public function eraseCredentials() {
        
    }

    public function getPassword() {
        return $this->usPassword;
    }

    public function getRoles() {

        return array('ROLE_USER');
    }

    public function getSalt() {
        
    }

    public function getUsername() {
        return $this->usUsername;
    }

}
