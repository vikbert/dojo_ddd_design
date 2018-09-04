<?php

declare(strict_types = 1);

namespace PriceCalculator\Service;

use PriceCalculator\Model\ProductCollection;

interface PricingInterface
{
    public function calculateNetTotal(ProductCollection $productCollection): float;

    public function calculateGrossTotal(ProductCollection $productCollection): float;
}
