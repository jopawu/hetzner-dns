<?php

namespace iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class AbstractRecord
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     */
    public function __construct($id, $name, $value)
    {
        $this->id = $this->validateId($id);
        $this->name = $this->validateName($name);
        $this->value = $this->validateValue($value);
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
    public function getValue()
    {
        return $this->value;
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
        return $name;
    }

    /**
     * @param string $value
     * @return $value
     */
    abstract function validateValue($value);
}
