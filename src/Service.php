<?php

namespace iit\Hetzner\DNS;

/**
 * Class Service
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Service
{
    protected $authToken = null;
    protected $apiServer = null;

    public function __construct($authToken, $apiServer)
    {
        $this->validateAuthToken($authToken);
        $this->validateApiServer($apiServer);
        $this->checkApiServer($apiServer);

        $this->authToken = $authToken;
        $this->apiServer = $apiServer;
    }

    protected function validateAuthToken($authToken)
    {
        if( !preg_match('/^([a-zA-Z0-9]){32}$/', $authToken) )
        {
            throw new InvalidArgumentException('invalid auth token given');
        }
    }

    protected function validateApiServer($apiServer)
    {
        if (!filter_var($apiServer, FILTER_VALIDATE_URL))
        {
            throw new InvalidArgumentException('invalid api server given');
        }
    }

    protected function checkApiServer($apiServer)
    {
        // todo: check api server online
    }

    public function allZones()
    {
        $request = new Request(
            $this->authToken, 'GET', $this->apiServer . '/zones'
        );

        return $request->execute();
    }
}
