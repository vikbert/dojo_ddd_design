<?php

declare(strict_types = 1);

namespace Domain\Service;

use Domain\Entity\Collection\ProductCollection;

interface PricingInterface
{
    public function calculateNetTotal(ProductCollection $productCollection): int;

    public function calculateGrossTotal(ProductCollection $productCollection): int;
}
