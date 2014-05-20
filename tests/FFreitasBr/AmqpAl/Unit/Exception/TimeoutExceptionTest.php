<?php

namespace FFreitasBr\AmqpAl\Unit\Exception;

use FFreitasBr\AmqpAl\Exception\TimeoutException;

/**
 * Class TimeoutExceptionTest
 *
 * @package FFreitasBr\AmqpAl\Unit\Exception
 */
class TimeoutExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testMustReturnDefaultMessage()
    {
        $exception = new TimeoutException();
        $this->assertEquals('Timeout occurred', $exception->getMessage());
    }

    public function testMustReturnDefaultEvenWithMessageInConstructorNull()
    {
        $exception = new TimeoutException(null);
        $this->assertEquals('Timeout occurred', $exception->getMessage());
    }

    public function testMustReturnMessageWithTimeout()
    {
        $exception = new TimeoutException(null, null, null, 50);
        $this->assertEquals('Timeout of 50 seconds occurred', $exception->getMessage());
    }

    public function testGetterOfTimeoutMustReturnNull()
    {
        $exception = new TimeoutException();
        $this->assertNull($exception->getTimeout());
    }

    public function testGetterOfTimeoutMustReturnTheValueOfConstructor()
    {
        $exception = new TimeoutException(null, null, null, 30);
        $this->assertEquals(30, $exception->getTimeout());
    }

    public function testGetterOfTimeoutMustReturnTheValueOfSetter()
    {
        $exception = (new TimeoutException())->setTimeout(40);
        $this->assertEquals(40, $exception->getTimeout());
    }
}
