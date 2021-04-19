<?php

namespace iit\Hetzner\DNS\Transfer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Response
{
    protected $httpCode = null;
    protected $mimeType = null;
    protected $response = null;

    public function __construct($httpCode, $mimeType, $response)
    {
        $this->httpCode = $httpCode;
        $this->mimeType = $mimeType;
        $this->response = $response;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getResponseArray()
    {
        return json_decode($this->response, true);
    }
}
