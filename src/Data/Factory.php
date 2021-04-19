<?php

namespace iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @param string $name
     * @param Record[] $records
     * @return Zone
     */
    public function zone($name, $records = [])
    {
        $zone = new Zone($name, $records);
        return $zone;
    }

    /**
     * @param string $name
     * @param string $type
     * @param string $value
     * @param int $ttl
     * @return Record
     */
    public function record($name, $type, $value, $ttl)
    {
        switch($type)
        {
            case Record\A::TYPE:
                $record = new Record\A();
                break;
            case Record\AAAA::TYPE:
                $record = new Record\AAAA();
                break;
            case Record\CNAME::TYPE:
                $record = new Record\CNAME();
                break;
            case Record\MX::TYPE:
                $record = new Record\MX();
                break;
            case Record\NS::TYPE:
                $record = new Record\NS();
                break;
            case Record\SRV::TYPE:
                $record = new Record\SRV();
                break;
            case Record\TXT::TYPE:
                $record = new Record\TXT();
                break;
            case Record\SOA::TYPE:
                $record = new Record\SOA();
                break;
        }

        return $record;
    }
}
