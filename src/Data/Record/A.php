<?php

namespace iit\Hetzner\DNS\Data\Record;

use iit\Hetzner\DNS\Data\AbstractRecord;
use iit\Hetzner\DNS\Data\Zone;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class A extends AbstractRecord
{
    const TYPE = 'A';

    /**
     * @return string
     */
    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($record, Zone::JSON_ENCODE_OPTIONS);
    }

    /**
     * @param string $value
     * @return string
     */
    public function validateValue($value)
    {
        return $this->validateIPv4($value);
    }

    /**
     * @param string $IPv4
     * @return string
     */
    protected function validateIPv4($IPv4)
    {
        return $IPv4;

        // TODO: check FILTER_FLAG_IPV4

        if( false === filter_var($IPv4, FILTER_FLAG_IPV4) )
        {
            throw new \InvalidArgumentException("invalid IPv4: {$IPv4}");
        }

        if( false === filter_var($IPv4, FILTER_FLAG_IPV4, FILTER_FLAG_NO_PRIV_RANGE) )
        {
            throw new \InvalidArgumentException("private range IPv4: {$IPv4}");
        }

        if( false === filter_var($IPv4, FILTER_FLAG_IPV4, FILTER_FLAG_NO_RES_RANGE) )
        {
            throw new \InvalidArgumentException("reserved range IPv4: {$IPv4}");
        }

        return $IPv4;
    }
}
