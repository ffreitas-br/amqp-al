<?php

namespace FFreitasBr\AmqpAl\Unit\Exception;

use FFreitasBr\AmqpAl\Exception\RemoteCallTimeoutException;

/**
 * Class RemoteCallTimeoutExceptionTest
 *
 * @package FFreitasBr\AmqpAl\Unit\Exception
 */
class RemoteCallTimeoutExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testMustReturnDefaultMessage()
    {
        $exception = new RemoteCallTimeoutException();
        $this->assertEquals('Remote call timeout occurred', $exception->getMessage());
    }

    public function testMustReturnDefaultEvenWithMessageInConstructorNull()
    {
        $exception = new RemoteCallTimeoutException(null);
        $this->assertEquals('Remote call timeout occurred', $exception->getMessage());
    }

    public function testMustReturnMessageWithTimeout()
    {
        $exception = new RemoteCallTimeoutException(null, null, null, 50);
        $this->assertEquals('Remote call timeout of 50 seconds occurred', $exception->getMessage());
    }
}
