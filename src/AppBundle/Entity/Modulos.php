<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Actividades;

/**
 * Modulos
 *
 * @ORM\Table(name="modulos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModulosRepository")
 */
class Modulos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_inicio", type="string", length=255)
     */
    private $fechaInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_fin", type="string", length=255)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_total", type="string", length=255)
     */
    private $horasTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_lectivas", type="string", length=255)
     */
    private $horasLectivas;

    /**
     * @var string
     *
     * @ORM\Column(name="profesor", type="string", length=255)
     */
    private $profesor;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
    * @ORM\ManyToOne(targetEntity="Actividades", inversedBy="inversed_modulos")
    * @ORM\JoinColumn(onDelete="CASCADE", referencedColumnName="id", nullable=false)     
    */    
    private $actividad;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Modulos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set fechaInicio
     *
     * @param string $fechaInicio
     *
     * @return Modulos
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param string $fechaFin
     *
     * @return Modulos
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return string
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set horasTotal
     *
     * @param string $horasTotal
     *
     * @return Modulos
     */
    public function setHorasTotal($horasTotal)
    {
        $this->horasTotal = $horasTotal;

        return $this;
    }

    /**
     * Get horasTotal
     *
     * @return string
     */
    public function getHorasTotal()
    {
        return $this->horasTotal;
    }

    /**
     * Set horasLectivas
     *
     * @param string $horasLectivas
     *
     * @return Modulos
     */
    public function setHorasLectivas($horasLectivas)
    {
        $this->horasLectivas = $horasLectivas;

        return $this;
    }

    /**
     * Get horasLectivas
     *
     * @return string
     */
    public function getHorasLectivas()
    {
        return $this->horasLectivas;
    }

    /**
     * Set profesor
     *
     * @param string $profesor
     *
     * @return Modulos
     */
    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return string
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Modulos
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set actividad
     *
     * @param object $actividad
     *
     * @return Modulos
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return object
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Get actividad_id
     *
     * @return integer
     */
    public function getActividad_id()
    {
        return $this->actividad->getId();
    }        
}

