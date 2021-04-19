<?php

namespace iit\Hetzner\DNS;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Service
{
    public function __construct($authToken, $apiServer)
    {
        $this->endpoint = new Transfer\Endpoint($authToken, $apiServer);
    }

    public function allZones()
    {
        $request = new Query\GetAllZones($this->endpoint);
        $response = $request->execute();
    }

    public function updateRecord()
    {
        $request = new Command\UpdateRecord($this->endpoint);
        $response = $request->execute();
    }
}
