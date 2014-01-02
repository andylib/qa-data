<?php

return array(
    'service_manager' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'Andylib\QA\Domain\Question\QuestionRepositoryInterface' => 'Andylib\QA\Data\Question\Service\QuestionRepositoryFactory',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'andylib_qa_mapping' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/doctrine-mappings',
                ),  
            ),  

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're do\ing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'Andylib\QA\Domain' => 'andylib_qa_mapping',
                )   
            )   
        )   
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
