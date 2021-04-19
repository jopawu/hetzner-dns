<?php

namespace iit\Hetzner\DNS\Transfer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Endpoint
{
    protected $authToken = null;
    protected $apiServer = null;

    public function __construct()
    {
        $this->validateAuthToken($authToken);
        $this->validateApiServer($apiServer);
        $this->checkApiServer($apiServer);

        $this->authToken = $authToken;
        $this->apiServer = $apiServer;
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    public function getApiServer()
    {
        return $this->apiServer;
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
}
