<?php
/**
 * The Vacancies Module Controller
 *
 * @author Denis Ushakov
 */

namespace Vacancies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Vacancies\Form\FilterForm;
use Vacancies\Model;

class VacanciesController extends AbstractActionController
{
	protected $em, $model;

    public function indexAction()
    {
		/** @var \Zend\Http\Request $request */
		$request = $this->getRequest();

		$languageId   = $request->getQuery('languages', 1);
		$departmentId = $request->getQuery('departments', null);

		$form  = new FilterForm();


		$departments = $this->getModel('Departments')->getDepartments($languageId)->getResult();
		$departmentOptions = ['' => ''];
		foreach ($departments as $department)
		{
			$key = $department["id"];
			$val = $department["title"];

			$departmentOptions[$key] = $val;
		}
		$form->get('departments')->setValueOptions($departmentOptions);


		$languages = $this->getModel('Languages')->getLanguages()->getResult();
		$languageOptions = ['' => ''];
		foreach ($languages as $language)
		{
			$key = $language["id"];
			$val = $language["name"];

			$languageOptions[$key] = $val;
		}
		$form->get('languages')->setValueOptions($languageOptions);


		$vacancies = $this->getModel('Vacancies')->getVacancies($languageId, $departmentId)->getResult();
        return new ViewModel(array(
			'title'     => 'Вакансии',
			'form'      => $form,
			'filter'    => [
				'department' => $departmentId,
				'language'   => $languageId,
			],
			'vacancies' => $vacancies
		));
	}

	public function addAction()
	{
		/** @var \Zend\Http\Request $request  */
		$request = $this->getRequest();

		return new ViewModel(array(
			'title' => 'Вакансии'
		));
	}

	public function editAction()
	{
		return new ViewModel(array(
			'title' => 'Вакансии'
		));
	}

	public function deleteAction()
	{
		return new ViewModel(array(
			'title' => 'Вакансии'
		));
	}

	/**
	 * @return \Vacancies\Model\Vacancies | \Vacancies\Model\Languages | \Vacancies\Model\Departments
	 */
	private function getModel($modelName)
	{
		if ( empty($this->model[$modelName]) ) {
			if ( empty($this->em[$modelName]) ) {
				$this->em[$modelName] = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
			}
			$namespace = 'Vacancies\\Model\\' . $modelName;
			$this->model[$modelName] = new $namespace($this->em[$modelName]);
		}
		return $this->model[$modelName];
	}
}
