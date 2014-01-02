<?php

return array(
    'service_manager' => array(
        'invokables' => array(
            'Andylib\QA\Domain\Question\QuestionRepositoryInterface' => 'Andylib\QA\Data\Question\QuestionRepository',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
