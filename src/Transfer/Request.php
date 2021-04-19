<?php

namespace iit\Hetzner\DNS\Transfer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Request
{
    const TYPE_GET = 'GET';
    const TYPE_PUT = 'PUT';
    const TYPE_POST = 'POST';
    const TYPE_DELETE = 'DELETE';

    const AUTH_HEADER_NAME = 'Auth-API-Token';

    protected $endpoint = null;

    public function __construct(Endpoint $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    protected function buildAuthHeader()
    {
        return self::AUTH_HEADER_NAME . ': ' . $this->endpoint->getAuthToken();
    }

    protected function buildRequestUrl()
    {
        return $this->endpoint->getApiServer() . $this->buildApiUrl();
    }

    final protected function fireRequest()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->buildRequestUrl());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->getRequestType());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [$this->getAuthHeader()]);

        if( $this->hasBody() )
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getBody());
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $mimeType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        curl_close($ch);

        return new Response($httpCode, $mimeType, $response);
    }

    abstract protected function getType();

    abstract protected function buildApiUrl();

    abstract protected function hasBody();

    abstract protected function getBody();

    abstract public function execute();
}
