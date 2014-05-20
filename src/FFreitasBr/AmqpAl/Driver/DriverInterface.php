<?php

namespace FFreitasBr\AmqpAl\Driver;

use FFreitasBr\AmqpAl\Exception\AmqpAlAbstractException;

/**
 * Class DriverInterface
 *
 * @package FFreitasBr\AmqpAl\Driver
 */
interface DriverInterface
{

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
    public function send($routingKey, $body, array $properties = null);

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
    public function remoteProcedureCall($routingKey, $body, array $properties = null, $timeout = null);

    /**
     * @param bool     $wait    When TRUE wait until a message become available in queue,
     *                          when FALSE return if there is none message available
     * @param null|int $timeout Seconds to wait before trigger a timeout exception
     *
     * @return mixed
     * @throws AmqpAlAbstractException
     */
    public function receive($wait = false, $timeout = null);
}
