<?php

declare(strict_types = 1);

use Domain\Entity\Product;
use Domain\Value\TaxRateDE;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $germanNormalTaxRate;
    private $germanReducedTaxRate;

    public function setUp()
    {
        $this->germanReducedTaxRate = TaxRateDE::getReducedTaxRate();
        $this->germanNormalTaxRate = TaxRateDE::getNormalTaxRate();
    }

    public function testGetGrossPrice()
    {
        $product = new Product('foo', 100.00, $this->germanNormalTaxRate);
        $this->assertSame(119.0, $product->getGrossPrice(), 'should return correct gross price');
    }

    public function testGetNetPrice()
    {
        $product = new Product('foo', 23.45, $this->germanNormalTaxRate);
        $this->assertSame(23.45, $product->getNetPrice(), 'net price should be same as price');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Name should not be empty.
     */
    public function testEmptyName()
    {
        $product = new Product(' ', 12.00, $this->germanNormalTaxRate);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Price should not be zero.
     */
    public function testPriceIsZero()
    {
        $product = new Product('P1', 0.00, $this->germanNormalTaxRate);
    }
}
