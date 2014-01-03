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

    protected $mockObjectManager;

    public function setUp()
    {
        $this->setApplicationConfig(
            include TestUtil::getApplicationConfigFile()
        );

        parent::setUp();

        $mockObjectManager = $this->getMockBuilder('Doctrine\Common\Persistence\ObjectManager')
                                 ->disableOriginalConstructor()
                                 ->getMock();
    
        $this->mockObjectManager = $mockObjectManager;

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Doctrine\ORM\EntityManager', $mockObjectManager);
        
        $this->questionRepository = $serviceManager->get('Andylib\QA\Domain\Question\QuestionRepositoryInterface');
    }
    
    public function testImplementQuestionRepositoryInterface()
    {
        $this->assertInstanceOf('Andylib\QA\Domain\Question\QuestionRepositoryInterface', $this->questionRepository);
    }

    public function testSaveCallObjectManagerPersistAndFlush()
    {
        $post = new Post('content', new \DateTime(), new User('abc'));

        $question = new Question($post);
        
        $id = new Id();
        $question->setId($id);
        $question->setTitle('some-title');
        
        $this->mockObjectManager->expects($this->once())
                              ->method('persist')
                              ->with($question);
        
        $this->mockObjectManager->expects($this->once())
                              ->method('flush');

        $this->questionRepository->save($question);
    }
}
