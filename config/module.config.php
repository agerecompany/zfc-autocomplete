<?php
namespace Agere\Autocomplete;

return array(

	'assetic_configuration' => require_once 'assets.config.php',

	'controllers' => [
		'aliases' => [
			'autocomplete' => Controller\IndexController::class,
		],
		'factories' => [
			Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
		],
	],

	'service_manager' => [
		'aliases' => [
			'AutocompleteService' => Service\AutocompleteService::class,
			'AutocompleteGrid' => Block\Grid\AutocompleteGrid::class, // only for GridFactory
		],
		'invokables' => [
			Model\Autocomplete::class => Model\Autocomplete::class,
			Service\AutocompleteService::class => Service\AutocompleteService::class,
		],
		'shared' => [
			Model\Autocomplete::class => false,
		],
	],

	'view_manager' => [
		'template_path_stack' => [
			__NAMESPACE__ => __DIR__ . '/../view',
		],
	],

	'doctrine' => [
		'driver' => [
			__NAMESPACE__ . '_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [__DIR__ . '/../src/Model'],
			],
			'orm_default' => [
				'drivers' => [
					__NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver',
				],
			],
		],
	],

	
);
