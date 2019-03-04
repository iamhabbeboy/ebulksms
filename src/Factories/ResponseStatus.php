<?php
namespace Abiodun\Ebulksms\Factories;

use Abiodun\Ebulksms\Contracts\ErrorCodeInterface;

class ResponseStatus implements ErrorCodeInterface
{
    public function __construct()
    {
    }

    /**
     * @param string $response
     */
    public static function json(string $response)
    {
        if ($response) {
            // echo $response;

            $status = [];
            $response = strtolower($response);

            if (preg_match('/success/', $response)) {
                $status['message'] = "Message sent successfully";
                $status['totalsent'] = "0";
                $status['cost'] = 0;
            } elseif (ErrorCodeInterface::HTTP_AUTH_FAILURE == $response) {
                $status['message'] = "Authentication failure";
            } elseif (ErrorCodeInterface::HTTP_UNKNOWN_ERROR == $response) {
                $status['message'] = "Unknown Error Occured";
            } elseif (ErrorCodeInterface::HTTP_MISSING_SENDER == $response) {
                $status['message'] = "Sender ID is Missing";
            } elseif (ErrorCodeInterface::HTTP_MISSING_APIKEY == $response) {
                $status['message'] = "API key is missing";
            } elseif (ErrorCodeInterface::HTTP_MISSING_MESSAGE == $response) {
                $status['message'] = "Message is missing";
            } elseif (ErrorCodeInterface::HTTP_INVALID_REQUEST == $response) {
                $status['message'] = "Invalid Request Sent";
            } elseif (ErrorCodeInterface::HTTP_INVALID_MESSAGE == $response) {
                $status['message'] = "Invalid Message Format";
            } elseif (ErrorCodeInterface::HTTP_MISSING_USERNAME == $response) {
                $status['message'] = "Developer username is missing";
            } elseif (ErrorCodeInterface::HTTP_MISSING_RECIPIENT == $response) {
                $status['message'] = "Phone Number(s) is missing";
            } elseif (ErrorCodeInterface::HTTP_INVALID_RECIPIENT == $response) {
                $status['message'] = "Invalid Phone Number(s) Supplied";
            } elseif (ErrorCodeInterface::HTTP_INSUFFICIENT_CREDIT == $response) {
                $status['message'] = "Insufficient credit/unit";
            } elseif (ErrorCodeInterface::HTTP_UNKNOWN_CONTENTTYPE == $response) {
                $status['message'] = "Unknown Content Type";
            } else {
                $status['message'] = "Unknown Error Occured";
            }
            return json_encode($status);
        }
    }
}
