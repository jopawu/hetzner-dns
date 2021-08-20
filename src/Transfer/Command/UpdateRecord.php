<?php

namespace iit\Hetzner\DNS\Transfer\Command;

use iit\Hetzner\DNS\Transfer\Request;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class UpdateRecord extends Request
{
    protected $body;

    public function execute()
    {
        throw new \Exception('not yet implemented');

        $body = '';

        return $this->fireRequest();
    }

    protected function buildApiUrl()
    {
        return '/zones';
    }

    function getRequestType()
    {
        return Request::TYPE_PUT;
    }

    protected function hasBody()
    {
        return true;
    }

    protected function getBody()
    {
        return null;
    }
}
