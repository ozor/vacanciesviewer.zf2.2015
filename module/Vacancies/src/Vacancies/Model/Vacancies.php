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



    public function getVacancies($languageId, $departmentId = null)
    {
        $where = 'vc.languageId = ?1';
        $parameters = array(1 => (int)$languageId);
        if ( !empty($departmentId) && (int)$departmentId > 0 ) {
            $where .= ' AND v.departmentId = :departmentId';
            $parameters['departmentId'] = (int)$departmentId;
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
}
