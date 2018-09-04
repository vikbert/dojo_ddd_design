<?php

declare(strict_types = 1);

namespace PriceCalculator\Service;

use PriceCalculator\Model\Product;
use PriceCalculator\Model\ProductCollection;

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
