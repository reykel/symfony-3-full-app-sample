<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Departamentos;
use AppBundle\Entity\Modulos;


/**
 * Actividades
 *
 * @ORM\Table(name="actividades")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActividadesRepository")
 */
class Actividades
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
     * @var int
     *
     * @ORM\Column(name="departamento_id", type="integer")
     */

    /**
    * @ORM\ManyToOne(targetEntity="Departamentos", inversedBy="inversed_actividades")
    * @ORM\JoinColumn(onDelete="CASCADE", referencedColumnName="id", nullable=false)     
    */    
    private $departamento;

    /**
    * @ORM\ManyToOne(targetEntity="Organismos", inversedBy="inversed_actividades")
    * @ORM\JoinColumn(onDelete="CASCADE", referencedColumnName="id", nullable=false)     
    */
    private $organismo;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="string", length=255)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="forma", type="string", length=255)
     */
    private $forma;

    /**
     * @var string
     *
     * @ORM\Column(name="grado", type="string", length=255)
     */
    private $grado;

    /**
     * @var string
     *
     * @ORM\Column(name="modalidad", type="string", length=255)
     */
    private $modalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="string", length=255)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="string", length=255)
     */
    private $sinopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="dirigido", type="string", length=255)
     */
    private $dirigido;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="string", length=255)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="calendario", type="string", length=255)
     */
    private $calendario;

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
     * @ORM\Column(name="hora_inicio", type="string", length=255)
     */
    private $horaInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="hora_fin", type="string", length=255)
     */
    private $horaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="total_horas", type="string", length=255)
     */
    private $totalHoras;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_lectivas", type="string", length=255)
     */
    private $horasLectivas;

    /**
     * @var string
     *
     * @ORM\Column(name="creditos", type="string", length=255)
     */
    private $creditos;

    /**
     * @var string
     *
     * @ORM\Column(name="matricula", type="string", length=255)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=255)
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=255)
     */
    private $lugar;

    /**
    * @ORM\ManyToOne(targetEntity="Coordinadores", inversedBy="inversed_actividades")
    * @ORM\JoinColumn(onDelete="CASCADE", referencedColumnName="id", nullable=false)     
    */  
    private $coordinador;

    /**
    * @ORM\OneToMany(targetEntity="Modulos", mappedBy="actividad")
    */
    private $inversed_modulos;

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
     * Set departamento
     *
     * @param integer $departamento
     *
     * @return Actividades
     */
    public function setdepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return int
     */
    public function getdepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set organismo
     *
     * @param integer $organismo
     *
     * @return Actividades
     */
    public function setorganismo($organismo)
    {
        $this->organismo = $organismo;

        return $this;
    }

    /**
     * Get organismo
     *
     * @return int
     */
    public function getorganismo()
    {
        return $this->organismo;
    }

    /**
     * Set entidad
     *
     * @param string $entidad
     *
     * @return Actividades
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set forma
     *
     * @param string $forma
     *
     * @return Actividades
     */
    public function setForma($forma)
    {
        $this->forma = $forma;

        return $this;
    }

    /**
     * Get forma
     *
     * @return string
     */
    public function getForma()
    {
        return $this->forma;
    }

    /**
     * Set grado
     *
     * @param string $grado
     *
     * @return Actividades
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    /**
     * Get grado
     *
     * @return string
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set modalidad
     *
     * @param string $modalidad
     *
     * @return Actividades
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Get modalidad
     *
     * @return string
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Actividades
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
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Actividades
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set sinopsis
     *
     * @param string $sinopsis
     *
     * @return Actividades
     */
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    /**
     * Get sinopsis
     *
     * @return string
     */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * Set dirigido
     *
     * @param string $dirigido
     *
     * @return Actividades
     */
    public function setDirigido($dirigido)
    {
        $this->dirigido = $dirigido;

        return $this;
    }

    /**
     * Get dirigido
     *
     * @return string
     */
    public function getDirigido()
    {
        return $this->dirigido;
    }

    /**
     * Set cantidad
     *
     * @param string $cantidad
     *
     * @return Actividades
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set calendario
     *
     * @param string $calendario
     *
     * @return Actividades
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;

        return $this;
    }

    /**
     * Get calendario
     *
     * @return string
     */
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * Set fechaInicio
     *
     * @param string $fechaInicio
     *
     * @return Actividades
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
     * @return Actividades
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
     * Set horaInicio
     *
     * @param string $horaInicio
     *
     * @return Actividades
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return string
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param string $horaFin
     *
     * @return Actividades
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return string
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set totalHoras
     *
     * @param string $totalHoras
     *
     * @return Actividades
     */
    public function setTotalHoras($totalHoras)
    {
        $this->totalHoras = $totalHoras;

        return $this;
    }

    /**
     * Get totalHoras
     *
     * @return string
     */
    public function getTotalHoras()
    {
        return $this->totalHoras;
    }

    /**
     * Set horasLectivas
     *
     * @param string $horasLectivas
     *
     * @return Actividades
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
     * Set creditos
     *
     * @param string $creditos
     *
     * @return Actividades
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Get creditos
     *
     * @return string
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Set matricula
     *
     * @param string $matricula
     *
     * @return Actividades
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set periodo
     *
     * @param string $periodo
     *
     * @return Actividades
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     *
     * @return Actividades
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set coordinador
     *
     * @param integer $coordinador
     *
     * @return Actividades
     */
    public function setcoordinador($coordinador)
    {
        $this->coordinador = $coordinador;

        return $this;
    }

    /**
     * Get coordinador
     *
     * @return int
     */
    public function getcoordinador()
    {
        return $this->coordinador;
    }
}

