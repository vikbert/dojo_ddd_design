<?php

declare(strict_types = 1);

namespace Application\Service;

use Application\Model\ProductCollection;

interface PricingInterface
{
    public function calculateNetTotal(ProductCollection $productCollection): float;

    public function calculateGrossTotal(ProductCollection $productCollection): float;
}
