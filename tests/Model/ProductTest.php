<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use PriceCalculator\Model\Product;
use PriceCalculator\Model\Tax;

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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Name should not be empty.
     */
    public function testEmptyName()
    {
        $product = new Product(' ', 12.00, Tax::NORMAL_TAX);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Price should not be zero.
     */
    public function testPriceIsZero()
    {
        $product = new Product('P1', 0.00, Tax::NORMAL_TAX);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Given Tax is not supported.
     */
    public function testInvalidTax()
    {
        $product = new Product('P1', 9.99, 99999);
    }
}
