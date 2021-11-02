<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Coordinadores
 *
 * @ORM\Table(name="coordinadores")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoordinadoresRepository")
 */
class Coordinadores
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
     * @ORM\Column(name="coordinador", type="string", length=255)
     */
    private $coordinador;

    /**
    * @ORM\OneToMany(targetEntity="Actividades", mappedBy="coordinador")
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
     * Set coordinador
     *
     * @param string $coordinador
     *
     * @return Coordinadores
     */
    public function setCoordinador($coordinador)
    {
        $this->coordinador = $coordinador;

        return $this;
    }

    /**
     * Get coordinador
     *
     * @return string
     */
    public function getCoordinador()
    {
        return $this->coordinador;
    }
}

