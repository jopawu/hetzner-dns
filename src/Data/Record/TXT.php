<?php

namespace iit\Hetzner\DNS\Data\Record;

use iit\Hetzner\DNS\Data\Zone as Zone;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class TXT extends Record
{
    const TYPE = 'txt';

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
        return $value;
    }
}
