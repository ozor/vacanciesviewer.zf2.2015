<?php

namespace Vacancies\Form;

use Zend\Form\Form;

class FilterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('vacancies');

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'languages',
            'options' => array()
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'departments',
            'options' => array()
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Применить',
                'id' => 'submitbutton',
            ),
        ));
    }
}