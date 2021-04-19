<?php

namespace iit\Hetzner\DNS;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Service
{
    /**
     * @var Transfer\Endpoint
     */
    protected $endpoint;

    /**
     * @param string $authToken
     * @param string $apiServer
     */
    public function __construct($authToken, $apiServer)
    {
        $this->endpoint = new Transfer\Endpoint($authToken, $apiServer);
    }

    /**
     * @return Transfer\Executor
     */
    public function transfer()
    {
        return new Transfer\Executor($this->endpoint);
    }

    /**
     * @return Data\Factory
     */
    public function data()
    {
        return new Data\Factory();
    }
}
