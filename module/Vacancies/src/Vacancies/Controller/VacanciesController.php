<?php
/**
 * The Vacancies Module Controller
 *
 * @author Denis Ushakov
 */

namespace Vacancies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Vacancies\Entity\Vacancies;
use Vacancies\Entity\VacancyContents;
use Vacancies\Entity\Departments;
use Vacancies\Entity\DepartmentContents;
use Vacancies\Entity\Languages;

class VacanciesController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

	public function addAction()
	{
	}

	public function editAction()
	{
	}

	public function deleteAction()
	{
	}
}
