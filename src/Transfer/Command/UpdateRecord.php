<?php

namespace iit\Hetzner\DNS\Transfer\Command;

use iit\Hetzner\DNS\Transfer\Request;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class UpdateRecord
{
    protected $body;

    public function execute()
    {
        $body =
        return $this->fireRequest();
    }

    function getType()
    {
        return Request::TYPE_PUT;
    }

    function buildApiUrl()
    {
        return '/zones';
    }

    protected function hasBody()
    {
        return true;
    }

    protected function getBody()
    {
        return null;
    }}
