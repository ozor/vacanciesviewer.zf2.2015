<?php

namespace VacanciesTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * @author Denis Ushakov
 */

class LanguagesControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/languages');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Vacancies');
        $this->assertControllerName('Vacancies\Controller\Languages');
        $this->assertControllerClass('LanguagesController');
        $this->assertMatchedRouteName('languages');
    }
}