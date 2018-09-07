<?php

declare(strict_types = 1);

use Domain\Entity\Product;
use Domain\Value\Price;
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
        $product = new Product('foo', new Price(100), $this->germanNormalTaxRate);
        $this->assertSame(119, $product->getGrossPrice()->get(), 'should return correct gross price');
    }

    public function testGetNetPrice()
    {
        $product = new Product('foo', new Price(2345), $this->germanNormalTaxRate);
        $this->assertSame(2345, $product->getNetPrice()->get(), 'net price should be same as price');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Name should not be empty.
     */
    public function testEmptyName()
    {
        $product = new Product(' ', new Price(1200), $this->germanNormalTaxRate);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Price should not be zero.
     */
    public function testPriceIsZero()
    {
        $product = new Product('P1', new Price(0), $this->germanNormalTaxRate);
    }
}
