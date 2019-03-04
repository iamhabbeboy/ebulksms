<?php
namespace Abiodun\Ebulksms\Tests;

use Abiodun\Ebulksms\Helpers\Sender;
use Abiodun\Ebulksms\Tests\BaseTestCase;

class SenderTest extends BaseTestCase
{
    protected $sender;
    protected $params;

    public function setUp()
    {
        $this->sender = new Sender;
        $this->params = [
            'to' => '080',
            'sender' => 'test',
            'message' => 'hello',
        ];
    }

    public function testValidateWithParam()
    {
        $response = $this->sender->validate($this->params);
        $this->assertNull($response);
    }
    // public function testParamValidator()
    // {
    //     $response = $this->sender->paramValidator();
    //     $this->assertTrue($response);
    // }

    public function testValidateWithOutParam()
    {
        $response = $this->sender->validate();
        $this->assertNull($response);
    }

    // public function testSendWithRequest()
    // {
    //     $response = $this->sender->send();
    //     $this->assertTrue($response);
    // }
}
