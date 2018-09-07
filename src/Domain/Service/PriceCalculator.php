<?php

declare(strict_types = 1);

namespace Domain\Service;

use Domain\Entity\Product;
use Domain\Entity\ProductCollection;

final class PriceCalculator implements PricingInterface
{
    private const PRECISION = 2;

    public function calculateNetTotal(ProductCollection $productCollection): int
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getNetPrice()->get();
        }, $productCollection->toArray()));

        return $result;
    }

    public function calculateGrossTotal(ProductCollection $productCollection): int
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getGrossPrice()->get();
        }, $productCollection->toArray()));

        return $result;
    }
}
