<?php

declare(strict_types = 1);

use Domain\Value\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    public function testToString(): void
    {
        $price = Price::fromFractionalUnits(11);
        $this->assertSame('11', (string) $price);

        $price = Price::fromMainUnits(1.11);
        $this->assertSame('111', (string) $price);
    }

    public function testFromEuros(): void
    {
        $priceReturned = Price::fromMainUnits(1.11);
        $priceExpected = new Price(111);

        $this->assertEquals($priceExpected, $priceReturned);
    }
}
