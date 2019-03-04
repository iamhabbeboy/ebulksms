<?php
require_once __DIR__ . '/vendor/autoload.php';
(new Dotenv\Dotenv(__DIR__))->load();

use Abiodun\Ebulksms\Ebulksms;

//Method 1:
Ebulksms::send([
    'to' => ['07061973357'],
    'sender' => 'abiodun',
    'message' => 'i want to love you',
]);
// Method 2
// $ebulksms = new Ebulksms();
// $ebulksms->sender = "Testing";
// $ebulksms->message = "Hello world my people";
// $ebulksms->to = ['+2347087322191', '07061973357'];
// $ebulksms->send();
//
// Ebulksms::balance();
