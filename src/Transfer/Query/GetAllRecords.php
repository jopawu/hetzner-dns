<?php

/* Copyright (c) 1998-2019 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace iit\Hetzner\DNS\Transfer\Query;

use iit\Hetzner\DNS\Transfer\Request;
use iit\Hetzner\DNS\Transfer\Response;
use iit\Hetzner\DNS\Transfer\Endpoint;
use iit\Hetzner\DNS\Data\Zone;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class GetAllRecords extends Request
{
    /**
     * @var string
     */
    protected $zoneId;

    /**
     * @param Endpoint $endpoint
     * @param string $zoneId
     */
    public function __construct(Endpoint $endpoint, $zoneId)
    {
        parent::__construct($endpoint);
        $this->zoneId = $zoneId;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->fireRequest();
    }

    protected function buildApiUrl()
    {
        return "/records?zone_id={$this->zoneId}";
    }

    protected function getRequestType()
    {
        return Request::TYPE_GET;
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
