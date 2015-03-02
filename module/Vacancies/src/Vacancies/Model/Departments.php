<?php

namespace Vacancies\Model;

/**
 * Model Departments
 */
class Departments
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

    public function getFilteredDepartments($lang_id)
    {
        $departments = $this->getEntityManager()->createQueryBuilder('Vacancies\Entity\Departments')
            ->select('d.id, dc.title')
            ->from('Vacancies\Entity\Departments', 'd')
            ->join('Vacancies\Entity\DepartmentContents', 'dc', 'WITH', 'd.id = dc.departmentId')
            ->where('dc.languageId = :languageId')
            ->getQuery()
            ->setParameters(array('languageId' => (int)$lang_id));

        $departments->execute();
        return $departments;
    }

}
