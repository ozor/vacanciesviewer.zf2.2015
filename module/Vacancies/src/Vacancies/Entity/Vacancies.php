<?php

namespace Vacancies\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacancies
 *
 * @ORM\Table(name="vacancies", indexes={@ORM\Index(name="departments_to_vacancies", columns={"department_id"})})
 * @ORM\Entity
 */
class Vacancies
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
     * @var integer
     *
     * @ORM\Column(name="department_id", type="integer", nullable=false)
     */
    private $departmentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;



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
     * Set departmentId
     *
     * @param integer $departmentId
     * @return Vacancies
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * Get departmentId
     *
     * @return integer 
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Vacancies
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
