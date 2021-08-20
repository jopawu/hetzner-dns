<?php

namespace iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @param string $id
     * @param string $name
     * @param Record[] $records
     * @return Zone
     */
    public function zone($id, $name, $records = [])
    {
        $zone = new Zone($id, $name, $records);
        return $zone;
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $type
     * @param string $value
     * @return Record
     */
    public function record($id, $name, $type, $value)
    {
        switch($type)
        {
            case Record\A::TYPE:
                $record = new Record\A($id, $name, $value);
                break;
            case Record\AAAA::TYPE:
                $record = new Record\AAAA($id, $name, $value);
                break;
            case Record\CNAME::TYPE:
                $record = new Record\CNAME($id, $name, $value);
                break;
            case Record\MX::TYPE:
                $record = new Record\MX($id, $name, $value);
                break;
            case Record\NS::TYPE:
                $record = new Record\NS($id, $name, $value);
                break;
            case Record\SRV::TYPE:
                $record = new Record\SRV($id, $name, $value);
                break;
            case Record\TXT::TYPE:
                $record = new Record\TXT($id, $name, $value);
                break;
            case Record\SOA::TYPE:
                $record = new Record\SOA($id, $name, $value);
                break;
        }

        return $record;
    }
}
