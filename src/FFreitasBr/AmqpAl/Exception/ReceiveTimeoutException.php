<?php

namespace FFreitasBr\AmqpAl\Exception;

/**
 * Class ReceiveTimeoutException
 *
 * @package FFreitasBr\AmqpAl\Exception
 */
class ReceiveTimeoutException extends TimeoutException
{

    /**
     * @var string
     */
    protected $message = 'Receive timeout occurred';
    protected $defaultMessage = 'Receive timeout occurred';
    protected $withTimeoutMessage = 'Receive timeout of %s seconds occurred';
}
