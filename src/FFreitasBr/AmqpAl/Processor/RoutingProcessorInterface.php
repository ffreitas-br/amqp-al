<?php

namespace FFreitasBr\AmqpAl\Processor;

/**
 * Class ReceivePostProcessorInterface
 *
 * @package FFreitasBr\AmqpAl\Processor
 */
interface RoutingProcessorInterface
{

    public function process();
}
