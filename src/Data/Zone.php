<?php

namespace iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Zone
{
    const JSON_ENCODE_OPTIONS = JSON_PRETTY_PRINT;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $this->validateName($name);
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($zone, static::JSON_ENCODE_OPTIONS);
    }

    /**
     * @param string $zone
     * @return string
     */
    protected function validateName($zone)
    {
        if( preg_match('/^(([a-z])(a-z0-9)*)(\.(([a-z])([a-z0-9])*))*$/', $zone) )
        {
            throw new \InvalidArgumentException("invalid zone: {$zone}");
        }

        return $name;
    }
}
