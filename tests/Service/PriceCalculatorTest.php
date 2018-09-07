<?php

declare(strict_types = 1);

use Domain\Entity\Product;
use Domain\Entity\ProductCollection;
use Domain\Service\PriceCalculator;
use Domain\Value\TaxRateDE;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
    private $service;
    private $normalTaxRate;
    private $reducedTaxRate;

    public function setUp()
    {
        $this->service = new PriceCalculator();
        $this->normalTaxRate = TaxRateDE::getNormalTaxRate();
        $this->reducedTaxRate = TaxRateDE::getReducedTaxRate();
    }

    public function testCalculateNetTotalReturnsZero()
    {
        $result = $this->service->calculateNetTotal(new ProductCollection());

        $this->assertSame(0.00, $result);
    }

    public function testCalculateNetTotalReturnsCorrectSum()
    {
        $products = new ProductCollection(
            new Product('P1', 100.00, $this->normalTaxRate),
            new Product('P2', 100.00, $this->reducedTaxRate)
        );
        $result = $this->service->calculateNetTotal($products);

        $this->assertSame(200.00, $result);
    }

    public function testCalculateGrossTotalReturnsZero()
    {
        $result = $this->service->calculateGrossTotal(new ProductCollection());

        $this->assertSame(0.00, $result);
    }

    public function testCalculateGrossTotalReturnsSum()
    {
        $products = new ProductCollection(
            new Product('P1', 100.00, $this->normalTaxRate),
            new Product('P2', 100.00, $this->reducedTaxRate)
        );
        $result = $this->service->calculateGrossTotal($products);

        $this->assertSame(226.00, $result);
    }
}
