<?php
namespace Abiodun\Ebulksms\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    public function receipientNumbers()
    {
        return '2347087322191,2348085457383,234802233211';
    }

    public function singleReceipientNumber()
    {
        return '2347087322191';
    }
}
