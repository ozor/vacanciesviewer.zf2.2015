<?php

namespace Vacancies\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VacancyContents
 *
 * @ORM\Table(name="vacancy_contents", indexes={@ORM\Index(name="languages_fk", columns={"language_id"}), @ORM\Index(name="vacancies_fk", columns={"vacancy_id"})})
 * @ORM\Entity
 */
class VacancyContents
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
     * @ORM\Column(name="vacancy_id", type="integer", nullable=false)
     */
    private $vacancyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;



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
     * Set vacancyId
     *
     * @param integer $vacancyId
     * @return VacancyContents
     */
    public function setVacancyId($vacancyId)
    {
        $this->vacancyId = $vacancyId;

        return $this;
    }

    /**
     * Get vacancyId
     *
     * @return integer 
     */
    public function getVacancyId()
    {
        return $this->vacancyId;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return VacancyContents
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return VacancyContents
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return VacancyContents
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
