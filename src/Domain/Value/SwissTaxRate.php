<?php

declare(strict_types = 1);

namespace Domain\Value;

final class SwissTaxRate extends TaxRate
{
    protected static $normalTaxRate = 7.5;
    protected static $reducedTaxRate = 2.5;
}
