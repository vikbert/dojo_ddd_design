<?php

declare(strict_types = 1);

namespace Domain\Service;

use Domain\Entity\Product;
use Domain\Entity\ProductCollection;

final class PriceCalculator implements PricingInterface
{
    private const PRECISION = 2;

    public function calculateNetTotal(ProductCollection $productCollection): float
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getNetPrice();
        }, $productCollection->toArray()));

        return round($result, self::PRECISION);
    }

    public function calculateGrossTotal(ProductCollection $productCollection): float
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getGrossPrice();
        }, $productCollection->toArray()));

        return round($result, self::PRECISION);
    }
}
