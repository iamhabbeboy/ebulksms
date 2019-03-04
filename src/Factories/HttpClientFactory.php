<?php
namespace Abiodun\Ebulksms\Factories;

use Abiodun\Ebulksms\Contracts\ResourceInterface;
use GuzzleHttp\Client;

class HttpClientFactory implements ResourceInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function buildUrl(array $params)
    {
        $baseUrl = 'http://api.ebulksms.com:8080' . ResourceInterface::SMS_ROUTE;
        $userName = 'iamhabbeboy@gmail.com';
        //$_ENV['EBULKSMS_USERNAME'];
        $apiKey = 'a05aecfe2e584aaf6e95b033a5903727caaef2a2';
        //$_ENV['EBULKSMS_APIKEY'];

        $authDetails = ['username' => $userName, 'apikey' => $apiKey];
        $params['recipients'] = $params['to'];
        $params['messagetext'] = $params['message'];
        unset($params['message']);
        unset($params['to']);
        $mergeData = array_merge($params, $authDetails);
        $ebulksmsUri = $baseUrl . '?' . http_build_query($mergeData);

        return $ebulksmsUri;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public static function call(array $params)
    {
        $client = new Client;
        $url = (new self)->buildUrl($params);
        $response = $client->get($url);
        return $response;
    }
}
