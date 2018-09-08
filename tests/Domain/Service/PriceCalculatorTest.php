<?php

declare(strict_types = 1);

use Domain\Entity\Collection\ProductCollection;
use Domain\Entity\Product;
use Domain\Service\PriceCalculator;
use Domain\Value\Price;
use Domain\Value\TaxRateDE;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
    private $service;
    private $normalTaxRate;
    private $reducedTaxRate;

    protected function setUp()
    {
        $this->service = new PriceCalculator();
        $this->normalTaxRate = TaxRateDE::getNormalTaxRate();
        $this->reducedTaxRate = TaxRateDE::getReducedTaxRate();
    }

    public function testCalculateNetTotalReturnsZero()
    {
        $result = $this->service->calculateNetTotal(new ProductCollection());

        $this->assertSame(0, $result);
    }

    public function testCalculateNetTotalReturnsCorrectSum()
    {
        $products = new ProductCollection(
            new Product('P1', new Price(100), $this->normalTaxRate),
            new Product('P2', new Price(100), $this->reducedTaxRate)
        );
        $result = $this->service->calculateNetTotal($products);

        $this->assertSame(200, $result);
    }

    public function testCalculateGrossTotalReturnsZero()
    {
        $result = $this->service->calculateGrossTotal(new ProductCollection());

        $this->assertSame(0, $result);
    }

    public function testCalculateGrossTotalReturnsSum()
    {
        $products = new ProductCollection(
            new Product('P1', new Price(100), $this->normalTaxRate),
            new Product('P2', new Price(100), $this->reducedTaxRate)
        );
        $result = $this->service->calculateGrossTotal($products);

        $this->assertSame(226, $result);
    }
}
