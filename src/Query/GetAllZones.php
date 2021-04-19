<?php

namespace iit\Hetzner\DNS\Query;

use iit\Hetzner\DNS\Transfer\Request;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class GetAllZones extends Request
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
