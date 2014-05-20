<?php

namespace FFreitasBr\AmqpAl\Driver\Configuration;

/**
 * Class DriverConfigurationInterface
 *
 * @package FFreitasBr\AmqpAl\Driver\Configuration
 */
interface DriverConfigurationInterface
{

    public function load(array $configuration);
    public function validate();

    public function get($property);
    public function set($property, $value);
    public function has($property);
}
