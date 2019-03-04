<?php
namespace Abiodun\Ebulksms\Contracts;

interface ErrorCodeInterface
{
    const HTTP_SUCCESS = "success";
    const HTTP_AUTH_FAILURE = "auth_failure";
    const HTTP_UNKNOWN_ERROR = "unknown_error";
    const HTTP_MISSING_SENDER = "missing_sender";
    const HTTP_INVALID_SENDER = "invalid_sender";
    const HTTP_MISSING_APIKEY = "missing_apikey";
    const HTTP_MISSING_MESSAGE = "missing_message";
    const HTTP_INVALID_REQUEST = "invalid_request";
    const HTTP_INVALID_MESSAGE = "invalid_message";
    const HTTP_MISSING_USERNAME = "missing_username";
    const HTTP_MISSING_RECIPIENT = "missing_recipient";
    const HTTP_INVALID_RECIPIENT = "invalid_recipient";
    const HTTP_INSUFFICIENT_CREDIT = "insufficient_credit";
    const HTTP_UNKNOWN_CONTENTTYPE = "unknown_contenttype"; //Check you post method to ensure there is a content-type header. Applies mostly to JSON and XML.
}
