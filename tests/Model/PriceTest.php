<?php

declare(strict_types = 1);

use Application\Model\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    public function testToString(): void
    {
        $price = Price::fromCents(11);
        $this->assertSame('11', (string) $price);

        $price = Price::fromEuros(1.11);
        $this->assertSame('111', (string) $price);
    }

    public function testGetAmount(): void
    {
        $price = Price::fromCents(11);
        $this->assertSame(11, $price->getAmount());

        $price = Price::fromEuros(1.11);
        $this->assertSame(111, $price->getAmount());
    }

    public function testFromEuros(): void
    {
        $priceReturned = Price::fromEuros(1.11);
        $priceExpected = new Price(111);

        $this->assertEquals($priceExpected, $priceReturned);
    }
}
