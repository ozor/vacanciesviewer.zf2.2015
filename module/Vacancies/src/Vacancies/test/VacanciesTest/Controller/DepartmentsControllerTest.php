<?php

namespace VacanciesTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * @author Denis Ushakov
 */

class DepartmentsControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/departments');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Vacancies');
        $this->assertControllerName('Vacancies\Controller\Departments');
        $this->assertControllerClass('DepartmentsController');
        $this->assertMatchedRouteName('departments');
    }
}