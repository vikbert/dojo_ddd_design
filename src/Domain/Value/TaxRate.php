<?php

declare(strict_types = 1);

namespace Domain\Value;

class TaxRate
{
    protected $taxRateValue;
    protected static $normalTaxRate = 0.0;
    protected static $reducedTaxRate = 0.0;

    private function __construct(float $value)
    {
        $this->taxRateValue = $value;
    }

    public static function getNormalTaxRate(): self
    {
        return new self(static::$normalTaxRate);
    }

    public static function getReducedTaxRate(): self
    {
        return new self(static::$reducedTaxRate);
    }

    public function __toString(): string
    {
        return (string) $this->taxRateValue;
    }

    public function getValue(): float
    {
        return $this->taxRateValue;
    }
}
