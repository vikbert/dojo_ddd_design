<?php

declare(strict_types = 1);

namespace Domain\Value;

final class GermanTaxRate extends TaxRate
{
    protected static $normalTaxRate = 19;
    protected static $reducedTaxRate = 7;
}
