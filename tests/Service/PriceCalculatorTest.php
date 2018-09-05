<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Application\Model\Product;
use Application\Model\ProductCollection;
use Application\Model\TaxRate;
use Application\Service\PriceCalculator;

class PriceCalculatorTest extends TestCase
{
    private $service;

    public function setUp()
    {
        $this->service = new PriceCalculator();
    }

    public function testCalculateNetTotalReturnsZero()
    {
        $result = $this->service->calculateNetTotal(new ProductCollection());

        $this->assertSame(0.00, $result);
    }

    public function testCalculateNetTotalReturnsCorrectSum()
    {
        $products = new ProductCollection(
            new Product('P1', 100.00, TaxRate::NORMAL_TAX),
            new Product('P2', 100.00, TaxRate::REDUCED_TAX)
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
            new Product('P1', 100.00, TaxRate::NORMAL_TAX),
            new Product('P2', 100.00, TaxRate::REDUCED_TAX)
        );
        $result = $this->service->calculateGrossTotal($products);

        $this->assertSame(226.00, $result);
    }
}
