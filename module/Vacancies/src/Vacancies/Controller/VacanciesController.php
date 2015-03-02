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

class VacanciesController extends AbstractActionController
{
	protected $em, $model;

    public function indexAction()
    {
		/** @var \Zend\Http\Request $request */
		$request = $this->getRequest();
		$model   = $this->getModel();

		$language_id   = $request->getQuery('languages', 1);
		$department_id = $request->getQuery('departments', null);

		$form  = new FilterForm();


		$departments = $model->getDepartments($language_id)->getResult();
		$dep_options = ['' => ''];
		foreach ($departments as $department)
		{
			$key = $department["id"];
			$val = $department["title"];

			$dep_options[$key] = $val;
		}
		$form->get('departments')->setValueOptions($dep_options);


		$languages = $model->getLanguages()->getResult();
		$lang_options = ['' => ''];
		foreach ($languages as $language)
		{
			$key = $language["id"];
			$val = $language["name"];

			$lang_options[$key] = $val;
		}
		$form->get('languages')->setValueOptions($lang_options);


		/** @var \Doctrine\ORM\Query $vacancies */
		$vacancies = $model->getVacancies($language_id, $department_id);
        return new ViewModel(array(
			'title'     => 'Вакансии',
			'form'      => $form,
			'filter'    => [
				'departments' => $department_id,
				'languages'   => $language_id,
			],
			'vacancies' => $vacancies->getResult()
		));
	}

	public function addAction()
	{
		/** @var \Zend\Http\Request $request  */
		$request = $this->getRequest();

		return new ViewModel(array(
			'title'     => 'Вакансии'
		));
	}

	public function editAction()
	{
		return new ViewModel(array(
			'title'     => 'Вакансии'
		));
	}

	public function deleteAction()
	{
		return new ViewModel(array(
			'title'     => 'Вакансии'
		));
	}

	/**
	 * @return \Vacancies\Model\Vacancies
	 */
	public function getModel()
	{
		if ( is_null($this->model) ) {
			if ( is_null($this->em) ) {
				$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
			}
			$this->model = new \Vacancies\Model\Vacancies($this->em);
		}
		return $this->model;
	}
}
