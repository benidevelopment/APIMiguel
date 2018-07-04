<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baja
 *
 * @ORM\Table(name="baja", uniqueConstraints={@ORM\UniqueConstraint(name="Identificacion_UNIQUE", columns={"Identificacion"})}, indexes={@ORM\Index(name="fk_Ejemplar_Ubicacion1_idx", columns={"Ubicacion_idUbicacion"}), @ORM\Index(name="fk_Ejemplar_Prestamo1_idx", columns={"Prestamo_idPrestamo"}), @ORM\Index(name="fk_Ejemplar_Articulo1_idx", columns={"Articulo_IdArticulo"})})
 * @ORM\Entity
 */
class Baja
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idEjemplar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idejemplar;

    /**
     * @var string
     *
     * @ORM\Column(name="Identificacion", type="string", length=45, nullable=false)
     */
    private $identificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaBaja", type="date", nullable=false)
     */
    private $fechabaja;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Prestado", type="boolean", nullable=true)
     */
    private $prestado;

    /**
     * @var \Articulo
     *
     * @ORM\ManyToOne(targetEntity="Articulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Articulo_IdArticulo", referencedColumnName="IdArticulo")
     * })
     */
    private $articuloarticulo;

    /**
     * @var \Prestamo
     *
     * @ORM\ManyToOne(targetEntity="Prestamo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Prestamo_idPrestamo", referencedColumnName="idPrestamo")
     * })
     */
    private $prestamoprestamo;

    /**
     * @var \Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Ubicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ubicacion_idUbicacion", referencedColumnName="idUbicacion")
     * })
     */
    private $ubicacionubicacion;

/**
     * Set idejemplar
     *
     * @return integer
     */
    public function SetIdejemplar($idejemplar)
    {
        $this->idejemplar = $idejemplar;
        
                return $this;
    }

    /**
     * Get idejemplar
     *
     * @return integer
     */
    public function getIdejemplar()
    {
        return $this->idejemplar;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     *
     * @return Ejemplar
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set fechaalta
     *
     * @param \DateTime $fechaalta
     *
     * @return Ejemplar
     */
    public function setFechabaja($fechabaja)
    {
        $this->fechabaja = $fechabaja;

        return $this;
    }

    /**
     * Get fechabaja
     *
     * @return \DateTime
     */
    public function getFechabaja()
    {
        return $this->fechabaja;
    }

    /**
     * Set prestado
     *
     * @param boolean $prestado
     *
     * @return Ejemplar
     */
    public function setPrestado($prestado)
    {
        $this->prestado = $prestado;

        return $this;
    }

    /**
     * Get prestado
     *
     * @return boolean
     */
    public function getPrestado()
    {
        return $this->prestado;
    }

    /**
     * Set articuloarticulo
     *
     * @param \AppBundle\Entity\Articulo $articuloarticulo
     *
     * @return Ejemplar
     */
    public function setArticuloarticulo(\AppBundle\Entity\Articulo $articuloarticulo = null)
    {
        $this->articuloarticulo = $articuloarticulo;

        return $this;
    }

    /**
     * Get articuloarticulo
     *
     * @return \AppBundle\Entity\Articulo
     */
    public function getArticuloarticulo()
    {
        return $this->articuloarticulo;
    }

    /**
     * Set prestamoprestamo
     *
     * @param \AppBundle\Entity\Prestamo $prestamoprestamo
     *
     * @return Ejemplar
     */
    public function setPrestamoprestamo(\AppBundle\Entity\Prestamo $prestamoprestamo = null)
    {
        $this->prestamoprestamo = $prestamoprestamo;

        return $this;
    }

    /**
     * Get prestamoprestamo
     *
     * @return \AppBundle\Entity\Prestamo
     */
    public function getPrestamoprestamo()
    {
        return $this->prestamoprestamo;
    }

    /**
     * Set ubicacionubicacion
     *
     * @param \AppBundle\Entity\Ubicacion $ubicacionubicacion
     *
     * @return Ejemplar
     */
    public function setUbicacionubicacion(\AppBundle\Entity\Ubicacion $ubicacionubicacion = null)
    {
        $this->ubicacionubicacion = $ubicacionubicacion;

        return $this;
    }

    /**
     * Get ubicacionubicacion
     *
     * @return \AppBundle\Entity\Ubicacion
     */
    public function getUbicacionubicacion()
    {
        return $this->ubicacionubicacion;
    }
    public function __toString() {
        
         $identificacion = $this->identificacion;
         return (string) $identificacion ;
       }
        
}
