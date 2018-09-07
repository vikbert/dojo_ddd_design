<?php

declare(strict_types = 1);

use Domain\Value\TaxRateDE;
use PHPUnit\Framework\TestCase;

class TaxRateDETest extends TestCase
{
    public function testGetNormalTaxRate()
    {
        $germanNormalTaxRate = TaxRateDE::getNormalTaxRate();
        $this->assertSame('19', (string) $germanNormalTaxRate);
    }

    public function testGetReducedTaxRate()
    {
        $germanReducedTaxRate = TaxRateDE::getReducedTaxRate();
        $this->assertSame('7', (string) $germanReducedTaxRate);
    }
}
