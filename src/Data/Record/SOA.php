<?php

namespace iit\Hetzner\DNS\Data\Record;

use iit\Hetzner\DNS\Data\Zone as Zone;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SOA extends Record
{
    const TYPE = 'soa';

    /**
     * @return string
     */
    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @param Zone $zone
     * @param $name
     * @param $value
     * @param $ttl
     */
    public function __construct(Zone $zone, $name, $value, $ttl)
    {
        throw new \Exception('handling of SOA records not yet supported/implemented');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode([], Zone::JSON_ENCODE_OPTIONS);
    }

    /**
     * @param string $value
     * @return string
     */
    public function validateValue($value)
    {
        return $value;
    }
}
