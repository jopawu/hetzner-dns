<?php

namespace iit\Hetzner\DNS\Transfer\Query;

use iit\Hetzner\DNS\Transfer\Request;
use iit\Hetzner\DNS\Transfer\Response;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class GetAllZones extends Request
{
    /**
     * @return Response
     */
    public function execute()
    {
        return $this->fireRequest();
    }

    protected function getRequestType()
    {
        return Request::TYPE_GET;
    }

    protected function buildApiUrl()
    {
        return '/zones';
    }

    protected function hasBody()
    {
        return false;
    }

    protected function getBody()
    {
        return null;
    }
}
