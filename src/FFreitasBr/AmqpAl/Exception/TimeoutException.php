<?php

namespace FFreitasBr\AmqpAl\Exception;

/**
 * Class TimeoutException
 *
 * @package FFreitasBr\AmqpAl\Exception
 */
class TimeoutException extends AmqpAlAbstractException
{

    /**
     * @var string
     */
    protected $message = 'Timeout occurred';

    /**
     * @var string
     */
    protected $defaultMessage = 'Timeout occurred';

    /**
     * @var string
     */
    protected $withTimeoutMessage = 'Timeout of %s seconds occurred';

    /**
     * @var null|int
     */
    protected $timeout = null;

    /**
     * @param string     $message
     * @param int        $code
     * @param \Exception $previous
     * @param null       $timeout
     */
    public function __construct($message = "", $code = 0, \Exception $previous = null, $timeout = null)
    {
        $this->setTimeout($timeout);
        parent::__construct($this->message, $code, $previous);
    }

    /**
     * @param int|null $timeout
     *
     * @return TimeoutException
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        if (isset($timeout)) {
            $this->message = sprintf($this->withTimeoutMessage, $this->timeout);
        } else {
            $this->message = $this->defaultMessage;
        }
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimeout()
    {
        return $this->timeout;
    }
}
