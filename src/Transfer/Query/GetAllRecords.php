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
     * @var Zone
     */
    protected $zone;

    /**
     * @param Endpoint $endpoint
     * @param Zone $zone
     */
    public function __construct(Endpoint $endpoint, Zone $zone)
    {
        parent::__construct($endpoint);
        $this->zone = $zone;
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
        return "/records?zone_id={$this->zone->getId()}";
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
