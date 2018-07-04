<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicacion
 *
 * @ORM\Table(name="ubicacion")
 * @ORM\Entity
 */
class Ubicacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUbicacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=45, nullable=false)
     */
    private $descripcion;



    /**
     * Get idubicacion
     *
     * @return integer
     */
    public function getIdubicacion()
    {
        return $this->idubicacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Ubicacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function __toString() {
        
         $descripcion = $this->descripcion;
         return (string) $descripcion ;
       }
}
