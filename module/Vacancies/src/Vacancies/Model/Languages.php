<?php

namespace Vacancies\Model;

/**
 * Model Languages
 */
class Languages
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->em;
    }

    public function getRepository($repositoryName)
    {
        return $this->em->getRepository($repositoryName);
    }

    public function getLanguages()
    {
        $departments = $this->getEntityManager()->createQueryBuilder('Vacancies\Entity\Languages')
            ->select('l.id, l.name')
            ->from('Vacancies\Entity\Languages', 'l')
            ->getQuery();

        $departments->execute();
        return $departments;
    }

}
