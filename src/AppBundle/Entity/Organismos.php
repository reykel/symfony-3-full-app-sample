<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Organismos
 *
 * @ORM\Table(name="organismos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrganismosRepository")
 */
class Organismos
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
     * @ORM\Column(name="organismo", type="string", length=255)
     */
    private $organismo;


    /**
    * @ORM\OneToMany(targetEntity="Actividades", mappedBy="organismo")
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
     * Set organismo
     *
     * @param string $organismo
     *
     * @return Organismos
     */
    public function setOrganismo($organismo)
    {
        $this->organismo = $organismo;

        return $this;
    }

    /**
     * Get organismo
     *
     * @return string
     */
    public function getOrganismo()
    {
        return $this->organismo;
    }
}

