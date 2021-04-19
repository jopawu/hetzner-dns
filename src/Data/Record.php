<?php

namespace iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Record
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Zone
     */
    protected $zone;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var int
     */
    protected $ttl;

    /**
     * @param Zone $zone
     * @param $name
     * @param $value
     * @param $ttl
     */
    public function __construct(Zone $zone, $name, $value, $ttl)
    {
        $this->zone = $zone;
        $this->name = $this->validateName($name);
        $this->value = $this->validateValue($value);
        $this->ttl = $this->validateTtl($ttl);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * @return string
     */
    abstract public function __toString();

    /**
     * @param string $value
     * @return $value
     */
    abstract function validateValue($value);

    /**
     * @param string $name
     * @return string
     */
    protected function validateName($name)
    {
        return $name;
    }

    /**
     * @param string $ttl
     * @return string
     */
    protected function validateTtl($ttl)
    {
        return $ttl;
    }
}
