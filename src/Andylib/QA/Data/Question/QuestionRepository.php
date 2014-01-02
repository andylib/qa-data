<?php

namespace Andylib\QA\Data\Question;

use Andylib\QA\Domain\Question\QuestionRepositoryInterface;
use Andylib\QA\Domain\Question\Question;
use Doctrine\Common\Persistence\ObjectManager;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $objectManager;
    
    protected $questions = array();

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }
    
    public function save(Question $question)
    {
        $this->objectManager->persist($question);
        $this->objectManager->flush();
    }

    public function get($id)
    {
        return $this->objectManager->find('Andylib\QA\Domain\Question\Question', $id);
    }
}
