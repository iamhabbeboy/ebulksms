<?php
namespace Abiodun\Ebulksms\Contracts;

interface ResourceInterface {
	const COUNTRY_CODE = "234";
	const SMS_ROUTE = "/sendsms";
	const BALANCE_ROUTE = "/balance/:username/:apikey";
}
