<?php

namespace FFreitasBr\AmqpAl\Unit\Exception;

use FFreitasBr\AmqpAl\Exception\ReceiveTimeoutException;

/**
 * Class ReceiveTimeoutExceptionTest
 *
 * @package FFreitasBr\AmqpAl\Unit\Exception
 */
class ReceiveTimeoutExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testMustReturnDefaultMessage()
    {
        $exception = new ReceiveTimeoutException();
        $this->assertEquals('Receive timeout occurred', $exception->getMessage());
    }

    public function testMustReturnDefaultEvenWithMessageInConstructorNull()
    {
        $exception = new ReceiveTimeoutException(null);
        $this->assertEquals('Receive timeout occurred', $exception->getMessage());
    }

    public function testMustReturnMessageWithTimeout()
    {
        $exception = new ReceiveTimeoutException(null, null, null, 50);
        $this->assertEquals('Receive timeout of 50 seconds occurred', $exception->getMessage());
    }
}
