<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Facultades;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Departamentos
 *
 * @ORM\Table(name="departamentos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartamentosRepository")
 */
class Departamentos
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
     * @ORM\Column(name="departamento", type="string", length=255)
     */
    private $departamento;

    /**
    * @ORM\ManyToOne(targetEntity="Facultades", inversedBy="inversed_departamentos")
    * @ORM\JoinColumn(onDelete="CASCADE", referencedColumnName="id", nullable=false)     
    */    
    private $facultad;

    /**
    * @ORM\OneToMany(targetEntity="Actividades", mappedBy="departamento")
    */
    private $inversed_actividades;

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
     * @param string $departamento
     *
     * @return Departamentos
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set facultad
     *
     * @param integer $facultad
     *
     * @return Departamentos
     */
    public function setfacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Get facultad
     *
     * @return int
     */
    public function getfacultad()
    {
        return $this->facultad;
    }
}

