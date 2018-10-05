<?php

declare(strict_types = 1);

namespace Domain\Service;

use Domain\Entity\Collection\ProductCollection;
use Domain\Entity\Product;

final class PriceCalculator implements PricingInterface
{
    /**
     * todo: priceCalculator should be able to calculate the product line item in a basket(warekorb)
     * - replace ProductCollection with ProductLineItemCollection
     * - ProductLineItem(Product $product, int $amount).
     */
    public function calculateNetTotal(ProductCollection $productCollection): int
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getNetPrice()->toCents();
        }, $productCollection->toArray()));

        return $result;
    }

    public function calculateGrossTotal(ProductCollection $productCollection): int
    {
        $result = array_sum(array_map(function (Product $product) {
            return $product->getGrossPrice()->toCents();
        }, $productCollection->toArray()));

        return $result;
    }
}
