<?php

namespace Andylib\QATest\Data\Question;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Andylib\QATest\Data\TestUtil;

use Andylib\QA\Domain\Account\User;
use Andylib\QA\Domain\Post\Post;
use Andylib\QA\Domain\Question\Question;
use Andylib\QA\Domain\Common\Id;

class QuestionRepositoryTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    
    protected $questionRepository;
    
    public function setUp()
    {
        $this->setApplicationConfig(
            include TestUtil::getApplicationConfigFile()
        );

        parent::setUp();

        $serviceManager = $this->getApplicationServiceLocator();
        $this->questionRepository = $serviceManager->get('Andylib\QA\Domain\Question\QuestionRepositoryInterface');
    }
    
    /*
    public function testImplementQuestionRepositoryInterface()
    {
        $this->assertInstanceOf('Andylib\QA\Domain\Question\QuestionRepositoryInterface', $this->questionRepository);
    }

    public function testSaveGet()
    {
        $post = new Post('content', new \DateTime(), new User('abc'));

        $question = new Question($post);
        
        $id = new Id();
        $question->setId($id);
        $question->setTitle('some-title');

        $this->questionRepository->save($question);
        
        $this->assertEquals($question, $this->questionRepository->get($id));
    }
    */

    public function testSkip()
    {
        $this->markTestSkipped('skipped for now');
    }
}
