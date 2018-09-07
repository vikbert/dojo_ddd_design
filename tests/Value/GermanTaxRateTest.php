<?php

declare(strict_types = 1);

use Domain\Value\GermanTaxRate;
use PHPUnit\Framework\TestCase;

class GermanTaxRateTest extends TestCase
{
    public function testGetNormalTaxRate()
    {
        $germanNormalTaxRate = GermanTaxRate::getNormalTaxRate();
        $this->assertSame("19", (string) $germanNormalTaxRate);
    }

    public function testGetReducedTaxRate()
    {
        $germanReducedTaxRate = GermanTaxRate::getReducedTaxRate();
        $this->assertSame("7", (string) $germanReducedTaxRate);
    }
}
