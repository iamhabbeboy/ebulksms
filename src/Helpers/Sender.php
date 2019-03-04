<?php
namespace Abiodun\Ebulksms\Helpers;

use Abiodun\Ebulksms\Contracts\ResourceInterface;
use Abiodun\Ebulksms\Factories\HttpClientFactory;
use Abiodun\Ebulksms\Factories\ResponseStatus;

class Sender implements ResourceInterface
{
    public function __construct($params)
    {
        return $this->send($params);
    }

    private function send($parameters = [])
    {
        $response = $this->formatRecipientsNumber($parameters['to']);
        $stripedParams = $parameters;
        $stripedParams['to'] = $response;

        $httpResponse = HttpClientFactory::call($stripedParams);
        $this->requestOutput($httpResponse);
    }

    // public function paramValidator()
    // {
    //     if (array_key_exists('to', $this->params)
    //         && array_key_exists('message', $this->params)
    //         && array_key_exists('sender', $this->params)) {
    //         return true;
    //     }
    //     return false;
    // }

    public function requestOutput($response)
    {
        $httpResponse = $response->getBody();
        $httpStatus = $response->getStatusCode();
        $output = $httpResponse->getContents();
        return ResponseStatus::json($output);
    }

    public function formatRecipientsNumber(array $phoneNumbers)
    {
        if (count($phoneNumbers) < 1) {
            return false;
        }
        $numberFormats = '';
        foreach ($phoneNumbers as $key => $phoneNumber) {
            if (substr($phoneNumber, 0, 1) == '0') {
                $numberFormat = substr($phoneNumber, 1);
            } elseif (substr($phoneNumber, 0, 1) == '+') {
                $numberFormat = substr($phoneNumber, 4);
            }

            $numberFormats .= ResourceInterface::COUNTRY_CODE . $numberFormat . ',';
        }
        return substr($numberFormats, 0, strlen($numberFormats) - 1);
    }
}
