<?php

namespace FFreitasBr\AmqpAl\Exception;

/**
 * Class RemoteCallTimeoutException
 *
 * @package FFreitasBr\AmqpAl\Exception
 */
class RemoteCallTimeoutException extends TimeoutException
{

    /**
     * @var string
     */
    protected $message = 'Remote call timeout occurred';
    protected $defaultMessage = 'Remote call timeout occurred';
    protected $withTimeoutMessage = 'Remote call timeout of %s seconds occurred';
}
