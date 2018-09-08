<?php

declare(strict_types = 1);

use Domain\Value\TaxRateCH;
use PHPUnit\Framework\TestCase;

class TaxRateCHTest extends TestCase
{
    public function testGetNormalTaxRate()
    {
        $normalTaxRate = TaxRateCH::getNormalTaxRate();
        $this->assertSame('7.5', (string) $normalTaxRate);
    }

    public function testGetReducedTaxRate()
    {
        $reducedTaxRate = TaxRateCH::getReducedTaxRate();
        $this->assertSame('2.5', (string) $reducedTaxRate);
    }
}
