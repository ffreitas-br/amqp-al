<?php

namespace FFreitasBr\AmqpAl\Driver;

use FFreitasBr\AmqpAl\Driver\Configuration\DriverConfigurationInterface;
use FFreitasBr\AmqpAl\Exception\AmqpAlAbstractException;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class PhpAmqpLibDriver
 *
 * @package FFreitasBr\AmqpAl\Driver
 */
class PhpAmqpLibDriver implements DriverInterface
{

    /**
     * @var DriverConfigurationInterface|null
     */
    protected $config = null;

    /**
     * @var AMQPConnection|null
     */
    protected $phpAmqpLibConnection = null;

    /**
     * @var AMQPChannel|null
     */
    protected $phpAmqpLibChannel = null;

    /**
     * Method responsible to send a message, returning true in case of success
     * In case of any problem an exception is triggered
     *
     * @param string     $routingKey The roting key, must be a string
     * @param string     $body       The body to send, must be a string
     * @param array|null $properties An array with custom properties
     *
     * @return boolean|mixed
     * @throws AmqpAlAbstractException
     */
    public function send($routingKey, $body, array $properties = null)
    {
        $this->genericSend($routingKey, $body, $properties);
        return $this;
    }

    /**
     * Method responsible to execute an remote procedure call, returning the response in case of success
     * In case of any problem an exception is triggered
     *
     * @param string     $routingKey The roting key, must be a string
     * @param string     $body       The body to send, must be a string
     * @param null|array $properties An array with custom properties
     * @param null|int   $timeout    Seconds to wait before trigger a timeout exception
     *
     * @return mixed
     * @throws AmqpAlAbstractException
     */
    public function remoteProcedureCall($routingKey, $body, array $properties = null, $timeout = null)
    {

    }

    /**
     * @param bool     $wait    When TRUE wait until a message become available in queue,
     *                          when FALSE return if there is none message available
     * @param null|int $timeout Seconds to wait before trigger a timeout exception
     *
     * @return mixed
     * @throws AmqpAlAbstractException
     */
    public function receive($wait = false, $timeout = null)
    {

    }

    /**
     * =======================================================
     * =======================================================
     * =======================================================
     * =======================================================
     */

    /**
     * @param string      $routingKey
     * @param string      $body
     * @param null|array  $properties
     * @param null|string $replyTo
     *
     * @return PhpAmqpLibDriver
     */
    protected function genericSend($routingKey, $body, array $properties = null, $replyTo = null)
    {
        $defaultProperties = array('delivery_mode' => 2);
        $properties = (isset($properties)) ? array_merge((array)$properties, $defaultProperties) : $defaultProperties;
        $msg = new AMQPMessage($body, $properties);
        if (isset($replyTo)) {
            $msg->set('reply_to', $replyTo);
        }
        $this->getChannel()->basic_publish($msg, $this->config->get('exchange_name'), $routingKey);
        return $this;
    }

    /**
     * Get the opened Channel
     * If is not open, open it and return
     *
     * @return AMQPChannel
     */
    protected function getChannel()
    {
        if (!isset($this->phpAmqpLibChannel)) {
            $this->phpAmqpLibChannel = $this->getConnection()->channel();
        }
        return $this->phpAmqpLibChannel;
    }

    /**
     * Get the opened Connection
     * If is not open, open it and return
     *
     * @return AMQPConnection
     */
    protected function getConnection()
    {
        if (!isset($this->phpAmqpLibConnection)) {
            $this->phpAmqpLibConnection = new AMQPConnection(
                $this->config->get('host'),
                $this->config->get('port'),
                $this->config->get('username'),
                $this->config->get('password'),
                $this->config->get('vHost')
            );
        }
        return $this->phpAmqpLibConnection;
    }
}
