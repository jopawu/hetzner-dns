<?php

/* Copyright (c) 1998-2019 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace iit\Hetzner\DNS;

/**
 * Class Request
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Request
{
    const AUTH_HEADER_NAME = 'Auth-API-Token';

    protected $authToken = null;
    protected $requestType = null;
    protected $requestUrl = null;

    public function __construct($authToken, $requestType, $requestUrl)
    {
        $this->authToken = $authToken;
        $this->requestType = $requestType;
        $this->requestUrl = $requestUrl;
    }

    protected function getAuthHeader()
    {
        return self::AUTH_HEADER_NAME . ': ' . $this->authToken;
    }

    public function execute()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->requestUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->requestType);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        echo $this->getAuthHeader()."\n";

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            $this->getAuthHeader()
        ]);

        $response = curl_exec($ch);

        echo "HTTP " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";

        curl_close($ch);

        return json_decode($response, false);
    }
}
