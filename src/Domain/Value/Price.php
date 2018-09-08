<?php

declare(strict_types = 1);

namespace Domain\Value;

final class Price
{
    private $fractionalUnits;

    public function __construct(int $fractionalUnits)
    {
        $this->fractionalUnits = $fractionalUnits;
    }

    public static function fromFractionalUnits(int $centAmount): self
    {
        return new self($centAmount);
    }

    public static function fromMainUnits(float $euros): self
    {
        return new self((int) bcmul((string) $euros, '100', 0));
    }

    public function toCents(): int
    {
        return $this->fractionalUnits;
    }

    public function __toString(): string
    {
        return (string) $this->fractionalUnits;
    }
}
