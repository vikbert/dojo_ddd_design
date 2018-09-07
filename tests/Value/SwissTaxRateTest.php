<?php

declare(strict_types = 1);

use Domain\Value\SwissTaxRate;
use PHPUnit\Framework\TestCase;

class SwissTaxRateTest extends TestCase
{
    public function testGetNormalTaxRate()
    {
        $normalTaxRate = SwissTaxRate::getNormalTaxRate();
        $this->assertSame('7.5', (string) $normalTaxRate);
    }

    public function testGetReducedTaxRate()
    {
        $reducedTaxRate = SwissTaxRate::getReducedTaxRate();
        $this->assertSame('2.5', (string) $reducedTaxRate);
    }
}
