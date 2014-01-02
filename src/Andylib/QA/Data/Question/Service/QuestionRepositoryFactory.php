<?php

namespace Andylib\QA\Data\Question\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Andylib\QA\Data\Question\QuestionRepository;

class QuestionRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        
        $repo = new QuestionRepository($em);

        return $repo;
    }
}
