<?php
/**
 * The Vacancies Module Controller
 *
 * @author Denis Ushakov
 */

namespace Vacancies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\TableGateway;
use Vacancies\Form;
use Vacancies\Form\FilterForm;
use Vacancies\Model;

class VacanciesController extends AbstractActionController
{
	protected $em, $model;

    public function indexAction()
    {
		/** @var \Zend\Http\Request $request */
		$request = $this->getRequest();

		$language_id   = $request->getQuery('languages', 1);
		$department_id = $request->getQuery('departments', null);

		$form  = new FilterForm();


		$departments = $this->getModel('Departments')->getFilteredDepartments($language_id)->getResult();
		$dep_options = ['' => ''];
		foreach ($departments as $department)
		{
			$key = $department["id"];
			$val = $department["title"];

			$dep_options[$key] = $val;
		}
		$form->get('departments')->setValueOptions($dep_options);


		$languages = $this->getModel('Languages')->getAllLanguages()->getResult();
		$lang_options = ['' => ''];
		foreach ($languages as $language)
		{
			$key = $language["id"];
			$val = $language["name"];

			$lang_options[$key] = $val;
		}
		$form->get('languages')->setValueOptions($lang_options);


		$vacancies = $this->getModel('Vacancies')->getFilteredVacancies($language_id, $department_id)->getResult();
        return new ViewModel(array(
			'title'     => 'Вакансии',
			'form'      => $form,
			'filter'    => [
				'departments' => $department_id,
				'languages'   => $language_id,
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
