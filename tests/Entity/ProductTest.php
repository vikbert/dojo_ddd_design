<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use PriceCalculator\Entity\Product;
use PriceCalculator\Entity\Tax;

class ProductTest extends TestCase
{
    public function testGetGrossPrice()
    {
        $product = new Product('foo', 100.00, TAX::NORMAL_TAX);
        $this->assertSame(119.0, $product->getGrossPrice(), 'should return correct gross price');
    }

    public function testGetNetPrice()
    {
        $product = new Product('foo', 23.45, TAX::REDUCED_TAX);
        $this->assertSame(23.45, $product->getNetPrice(), 'net price should be same as price');
    }
}
