<?php

namespace Andylib\QA\Data\Question;

use Andylib\QA\Domain\Question\QuestionRepositoryInterface;
use Andylib\QA\Domain\Question\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $questions = array();
    
    public function save(Question $question)
    {
        $this->questions[] = $question;
    }

    public function get($id)
    {
        foreach ($this->questions as $question) {
            if ($question->getId() == $id) {
                return $question;
            }
        }
    }
}
