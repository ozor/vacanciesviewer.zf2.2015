<?php
/**
 * The Vacancies Module Configuration
 *
 * @author Denis Ushakov
 */

return array(
	'controllers' => array(
		'invokables' => array(
			'Vacancies\Controller\Vacancies' => 'Vacancies\Controller\VacanciesController',
		),
	),

	// Routing
	'router' => array(
		'routes' => array(
			'vacancies' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/vacancies[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Vacancies\Controller\Vacancies',
						'action'     => 'index',
					),
				),
			),
		),
	),

	'view_manager' => array(
		'template_path_stack' => array(
			'album' => __DIR__ . '/../view',
		),
	),

	'doctrine' => array(
		'driver' => array(
			'vacancies_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/Vacancies/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					'Vacancies\Entity' => 'vacancies_driver'
				)
			)
		)
	),
);
