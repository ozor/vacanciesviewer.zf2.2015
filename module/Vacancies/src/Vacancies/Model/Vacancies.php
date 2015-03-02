<?php

namespace Vacancies\Model;

/**
 * Model Vacancies
 */
class Vacancies
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



    public function getVacancies($lang_id, $department_id = null)
    {
        $where = 'vc.languageId = ?1';
        $parameters = array(1 => (int)$lang_id);
        if ( !empty($department_id) && (int)$department_id > 0 ) {
            $where .= ' AND v.departmentId = :departmentId';
            $parameters['departmentId'] = (int)$department_id;
        }

        $vacancies = $this->getEntityManager()->createQueryBuilder('Vacancies\Entity\Vacancies')
            ->select('v.id, vc.title, vc.content')
            ->from('Vacancies\Entity\Vacancies', 'v')
            ->join('Vacancies\Entity\VacancyContents', 'vc', 'WITH', 'v.id = vc.vacancyId')
            ->where($where)->getQuery()
            ->setParameters($parameters);

        $vacancies->execute();
        return $vacancies;
    }

    public function getDepartments($lang_id)
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
