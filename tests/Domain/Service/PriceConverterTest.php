<?php

declare(strict_types = 1);

use Domain\Service\PriceConverter;
use Domain\Value\Price;
use Domain\Value\TaxRateDE;
use PHPUnit\Framework\TestCase;

class PriceConverterTest extends TestCase
{
    private $converter;

    public function setUp()
    {
        $this->converter = new PriceConverter();
    }

    public function testConvertGrossPriceWithTaxRateDE()
    {
        $taxRateDE = TaxRateDE::getNormalTaxRate();
        $price = new Price(100);

        $this->assertSame('119', (string) $this->converter->convertToGrossPrice($price, $taxRateDE));
    }
}
