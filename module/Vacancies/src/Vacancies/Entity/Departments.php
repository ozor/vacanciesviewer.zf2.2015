<?php

namespace Vacancies\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departments
 *
 * @ORM\Table(name="departments")
 * @ORM\Entity
 */
class Departments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="default_title", type="string", length=255, nullable=false)
     */
    private $defaultTitle;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set defaultTitle
     *
     * @param string $defaultTitle
     * @return Departments
     */
    public function setDefaultTitle($defaultTitle)
    {
        $this->defaultTitle = $defaultTitle;

        return $this;
    }

    /**
     * Get defaultTitle
     *
     * @return string 
     */
    public function getDefaultTitle()
    {
        return $this->defaultTitle;
    }
}
