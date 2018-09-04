<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use PriceCalculator\Model\Product;
use PriceCalculator\Model\ProductCollection;
use PriceCalculator\Model\TaxRate;

class ProductCollectionTest extends Testcase
{
    public function testEmptyCollection()
    {
        $products = new ProductCollection();

        $this->assertEmpty($products->getIterator());
    }

    public function testCollectionWithProducts()
    {
        $products = new ProductCollection(
            new Product('P1', 10.01, TaxRate::NORMAL_TAX),
            new Product('P2', 10.02, TaxRate::NORMAL_TAX)
        );

        $this->assertCount(2, $products);
    }

    public function testAddProduct()
    {
        $p1 = new Product('P1', 10.99, TaxRate::NORMAL_TAX);

        $products = new ProductCollection();

        $this->assertCount(1, $products->addProduct($p1));
        $this->assertCount(2, $products->addProduct($p1));
    }
}
