<?php
namespace Abiodun\Ebulksms;
use Abiodun\Ebulksms\Helpers\Sender;

class Ebulksms {

	/**
	 * @var mixed
	 */
	public $to;
	/**
	 * @var mixed
	 */
	public $sender;
	/**
	 * @var mixed
	 */
	public $message;

	/**
	 * @param $name
	 * @param $arguments
	 */
	public static function __callStatic($name, $arguments) {
		if ($name == 'send') {
			call_user_func([get_class(), 'sendStatic'], $arguments);
		}
	}

	/**
	 * @param $name
	 * @param $arguments
	 */
	public function __call($name, $arguments) {
		if ($name == 'send') {
			call_user_func([get_class(), 'sendNonStatic'], $arguments);
		}
	}

	/**
	 * @return mixed
	 */
	public function sendNonStatic() {

		$paramsBuilder = [
			'to' => $this->to,
			'sender' => $this->sender,
			'message' => $this->message,
		];
		return $this->processRequest($paramsBuilder);
	}

	/**
	 * @param array $params
	 */
	public static function sendStatic($params = []) {
		return (new self)->processRequest($params[0]);
	}

	/**
	 * @param $params
	 */
	public function processRequest($params) {
		return new Sender($params);
	}
}
