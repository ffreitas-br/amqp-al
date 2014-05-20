<?php

namespace FFreitasBr\AmqpAl\Unit;

use FFreitasBr\AmqpAl\AmqpAl;
use FFreitasBr\AmqpAl\Unit\Processor\ReceivePostProcessor;
use FFreitasBr\AmqpAl\Unit\Processor\RoutingProcessor;
use FFreitasBr\AmqpAl\Unit\Processor\SendPreProcessor;

/**
 * Class AmqpAlTest
 *
 * @package FFreitasBr\AmqpAl\Unit
 */
class AmqpAlTest extends \PHPUnit_Framework_TestCase
{

    public function testAttachDetachAndGetRoutingProcessor()
    {
        $amqpAl = new AmqpAl();
        // test unavailable routing processor
        $this->assertNull($amqpAl->getRoutingProcessor('not_exist'));
        // attach a processor without name
        $processor = new RoutingProcessor();
        $amqpAl->attachRoutingProcessor($processor);
        $this->assertSame($processor, $amqpAl->getRoutingProcessor($processor));
        $amqpAl->detachRoutingProcessor($processor);
        $this->assertNull($amqpAl->getRoutingProcessor($processor));
        // attach a processor with a name
        $anotherProcessor = new RoutingProcessor();
        $amqpAl->attachRoutingProcessor($anotherProcessor, 'name');
        $this->assertSame($anotherProcessor, $amqpAl->getRoutingProcessor('name'));
        $amqpAl->detachRoutingProcessor('name');
        $this->assertNull($amqpAl->getRoutingProcessor('name'));
    }

    public function testAttachDetachAndGetSendPreProcessor()
    {
        $amqpAl = new AmqpAl();
        // test unavailable routing processor
        $this->assertNull($amqpAl->getSendPreProcessor('not_exist'));
        // attach a processor without name
        $processor = new SendPreProcessor();
        $amqpAl->attachSendPreProcessor($processor);
        $this->assertSame($processor, $amqpAl->getSendPreProcessor($processor));
        $amqpAl->detachSendPreProcessor($processor);
        $this->assertNull($amqpAl->getSendPreProcessor($processor));
        // attach a processor with a name
        $anotherProcessor = new SendPreProcessor();
        $amqpAl->attachSendPreProcessor($anotherProcessor, 'name');
        $this->assertSame($anotherProcessor, $amqpAl->getSendPreProcessor('name'));
        $amqpAl->detachSendPreProcessor('name');
        $this->assertNull($amqpAl->getSendPreProcessor('name'));
    }

    public function testAttachDetachAndGetReceivePostProcessor()
    {
        $amqpAl = new AmqpAl();
        // test unavailable routing processor
        $this->assertNull($amqpAl->getSendPreProcessor('not_exist'));
        // attach a processor without name
        $processor = new ReceivePostProcessor();
        $amqpAl->attachReceivePostProcessor($processor);
        $this->assertSame($processor, $amqpAl->getReceivePostProcessor($processor));
        $amqpAl->detachReceivePostProcessor($processor);
        $this->assertNull($amqpAl->getReceivePostProcessor($processor));
        // attach a processor with a name
        $anotherProcessor = new ReceivePostProcessor();
        $amqpAl->attachReceivePostProcessor($anotherProcessor, 'name');
        $this->assertSame($anotherProcessor, $amqpAl->getReceivePostProcessor('name'));
        $amqpAl->detachReceivePostProcessor('name');
        $this->assertNull($amqpAl->getReceivePostProcessor('name'));
    }
}
