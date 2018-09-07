<?php

declare(strict_types = 1);

namespace Domain\Service;

use Domain\Value\Price;
use Domain\Value\TaxRate;

final class PriceConverter
{
    public function convertToGrossPrice(Price $netPrice, TaxRate $taxRate): Price
    {
        $taxValue = bcadd('1', bcdiv((string) $taxRate, '100', 3), 3);

        return Price::fromFractionalUnits((int) bcmul((string) $netPrice, $taxValue, 0));
    }
}
