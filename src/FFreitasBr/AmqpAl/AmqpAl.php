<?php

namespace FFreitasBr\AmqpAl;

use FFreitasBr\AmqpAl\Driver\DriverInterface;
use FFreitasBr\AmqpAl\Processor\ReceivePostProcessorInterface;
use FFreitasBr\AmqpAl\Processor\RoutingProcessorInterface;
use FFreitasBr\AmqpAl\Processor\SendPreProcessorInterface;

/**
 * Class AmqpAl
 *
 * @package FFreitasBr\AmqpAl
 */
class AmqpAl
{

    /**
     * @var null|DriverInterface
     */
    protected $driver = null;

    /**
     * @var array|RoutingProcessorInterface[]
     */
    protected $routingProcessors = array();

    /**
     * @var array|SendPreProcessorInterface[]
     */
    protected $sendPreProcessors = array();

    /**
     * @var array|ReceivePostProcessorInterface[]
     */
    protected $receivePostProcessors = array();

    /**
     * @param RoutingProcessorInterface $processor The routing processor
     * @param null|string               $name      The name of this processor
     *
     * @return AmqpAl
     */
    public function attachRoutingProcessor(RoutingProcessorInterface $processor, $name = null)
    {
        $name = (isset($name)) ? $name : spl_object_hash($processor);
        $this->routingProcessors[$name] = $processor;
        return $this;
    }

    /**
     * @param string|RoutingProcessorInterface $identification The index or name who identifies the processor to detach
     *
     * @return AmqpAl
     */
    public function detachRoutingProcessor($identification)
    {
        if ($identification instanceof RoutingProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->routingProcessors)) {
            unset($this->routingProcessors[$identification]);
        }
        return $this;
    }

    /**
     * @param string|RoutingProcessorInterface $identification The index or name who identifies the processor to detach
     *
     * @return RoutingProcessorInterface|null
     */
    public function getRoutingProcessor($identification)
    {
        if ($identification instanceof RoutingProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->routingProcessors)) {
            return $this->routingProcessors[$identification];
        }
        return null;
    }

    /**
     * @param SendPreProcessorInterface $processor The send pre processor
     * @param null|string               $name      The name of this processor
     *
     * @return AmqpAl
     */
    public function attachSendPreProcessor(SendPreProcessorInterface $processor, $name = null)
    {
        $name = (isset($name)) ? $name : spl_object_hash($processor);
        $this->sendPreProcessors[$name] = $processor;
        return $this;
    }

    /**
     * @param SendPreProcessorInterface|string $identification The index or name who identifies the processor to detach
     *
     * @return AmqpAl
     */
    public function detachSendPreProcessor($identification)
    {
        if ($identification instanceof SendPreProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->sendPreProcessors)) {
            unset($this->sendPreProcessors[$identification]);
        }
        return $this;
    }

    /**
     * @param SendPreProcessorInterface|string $identification The index or name who identifies the processor to detach
     *
     * @return SendPreProcessorInterface|null
     */
    public function getSendPreProcessor($identification)
    {
        if ($identification instanceof SendPreProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->sendPreProcessors)) {
            return $this->sendPreProcessors[$identification];
        }
        return null;
    }

    /**
     * @param ReceivePostProcessorInterface $processor The receive post processor
     * @param null|string                   $name      The name of this processor
     *
     * @return AmqpAl
     */
    public function attachReceivePostProcessor(ReceivePostProcessorInterface $processor, $name = null)
    {
        $name = (isset($name)) ? $name : spl_object_hash($processor);
        $this->receivePostProcessors[$name] = $processor;
        return $this;
    }

    /**
     * @param ReceivePostProcessorInterface|string $identification The index or name who identifies the processor to detach
     *
     * @return AmqpAl
     */
    public function detachReceivePostProcessor($identification)
    {
        if ($identification instanceof ReceivePostProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->receivePostProcessors)) {
            unset($this->receivePostProcessors[$identification]);
        }
        return $this;
    }

    /**
     * @param ReceivePostProcessorInterface|string $identification The index or name who identifies the processor to detach
     *
     * @return ReceivePostProcessorInterface|null
     */
    public function getReceivePostProcessor($identification)
    {
        if ($identification instanceof ReceivePostProcessorInterface) {
            $identification = spl_object_hash($identification);
        }
        if (array_key_exists($identification, $this->receivePostProcessors)) {
            return $this->receivePostProcessors[$identification];
        }
        return null;
    }
}
