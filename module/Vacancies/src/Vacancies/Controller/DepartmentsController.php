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

class DepartmentsController extends AbstractActionController
{
    protected $em, $model;

    public function indexAction()
    {
        /** @var \Zend\Http\Request $request */
        $request = $this->getRequest();

        $form  = new FilterForm();

        $languageId = $request->getQuery('languages', 1);
        $languages  = $this->getModel('Departments')->getDepartments($languageId)->getResult();
        return new ViewModel(array(
            'title'     => 'Языки',
            'form'      => $form,
            'filter'    => [
                'languages' => $languageId,
            ],
            'languages' => $languages,
        ));
    }

    public function addAction()
    {
        /** @var \Zend\Http\Request $request  */
        $request = $this->getRequest();

        return new ViewModel(array(
            'title'    => 'Отделы',
//            'form'     => $form,
            'language' => '',
        ));
    }

    public function editAction()
    {
        /** @var \Zend\Http\Request $request  */
        $request = $this->getRequest();

        return new ViewModel(array(
            'title'    => 'Отделы',
//            'form'     => $form,
            'language' => '',
        ));
    }

    public function deleteAction()
    {
        /** @var \Zend\Http\Request $request  */
        $request = $this->getRequest();

        return new ViewModel(array(
            'title' => 'Отделы'
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
