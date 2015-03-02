<?php

namespace VacanciesTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class VacanciesControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../../../../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/vacancies');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Vacancies');
        $this->assertControllerName('Vacancies\Controller\Vacancies');
        $this->assertControllerClass('VacanciesController');
        $this->assertMatchedRouteName('vacancies');
    }
}