<?php

namespace iit\Hetzner\DNS\Data\Record;

use iit\Hetzner\DNS\Data\Zone as Zone;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class AAAA extends Record
{
    const TYPE = 'aaaa';

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
        return $this->validateIPv6($value);
    }

    /**
     * @param string $IPv6
     * @return string
     */
    protected function validateIPv6($IPv6)
    {
        if( false === filter_var($IPv6, FILTER_FLAG_IPV6) )
        {
            throw new \InvalidArgumentException("invalid IPv6: {$IPv6}");
        }

        if( false === filter_var($IPv6, FILTER_FLAG_IPV6, FILTER_FLAG_NO_PRIV_RANGE) )
        {
            throw new \InvalidArgumentException("private range IPv6: {$IPv6}");
        }

        if( false === filter_var($IPv6, FILTER_FLAG_IPV6, FILTER_FLAG_NO_RES_RANGE) )
        {
            throw new \InvalidArgumentException("reserved range IPv6: {$IPv6}");
        }

        return $IPv6;
    }
}
