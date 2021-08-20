<?php

namespace iit\Hetzner\DNS\Data;

use iit\Hetzner\DNS\Data\AbstractRecord;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Zone
{
    const JSON_ENCODE_OPTIONS = JSON_PRETTY_PRINT;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var AbstractRecord[]
     */
    protected $records;

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = $this->validateId($id);
        $this->name = $this->validateName($name);
    }

    /**
     * @param AbstractRecord[] $records
     */
    public function setRecords(array $records)
    {
        $this->records = $this->validateRecords($records);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->name, static::JSON_ENCODE_OPTIONS);
    }

    /**
     * @param string $id
     * @return string
     */
    protected function validateId($id)
    {
        if( !preg_match('/^([a-zA-Z0-9]*)$/', $id) )
        {
            throw new \InvalidArgumentException("invalid zone id: {$id}");
        }

        return $id;
    }

    /**
     * @param string $name
     * @return string
     */
    protected function validateName($name)
    {
        if( !preg_match('/^(([a-z0-9])([a-z0-9\-])*)(\.([a-z])*)$/', $name) )
        {
            throw new \InvalidArgumentException("invalid zone name: {$name}");
        }

        return $name;
    }

    /**
     * @param AbstractRecord[] $records
     * @return AbstractRecord[]
     */
    protected function validateRecords(array $records)
    {
        foreach($records as $record)
        {
            if( $record instanceof AbstractRecord )
            {
                continue;
            }

            throw new \InvalidArgumentException("invalid record object given");
        }

        return $records;
    }
}
