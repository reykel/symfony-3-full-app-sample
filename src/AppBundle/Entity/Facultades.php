<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Facultades
 *
 * @ORM\Table(name="facultades")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FacultadesRepository")
 */
class Facultades
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
     * @ORM\Column(name="facultad", type="string", length=255)
     */
    private $facultad;

    /**
    * @ORM\OneToMany(targetEntity="Departamentos", mappedBy="facultad")
    */
    private $inversed_departamentos;

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
     * Set facultad
     *
     * @param string $facultad
     *
     * @return Facultades
     */
    public function setFacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Get facultad
     *
     * @return string
     */
    public function getFacultad()
    {
        return $this->facultad;
    }
}

