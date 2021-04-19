<?php

namespace iit\Hetzner\DNS\Command;

use iit\Hetzner\DNS\Transfer\Request;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class UpdateRecord
{
    public function execute()
    {
        return $this->fireRequest();
    }

    function getType()
    {
        return Request::TYPE_GET;
    }

    function buildApiUrl()
    {
        return '/zones';
    }
}
