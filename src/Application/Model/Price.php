<?php

declare(strict_types = 1);

namespace Application\Model;

final class Price
{
    private $centAmount;

    public function __construct(int $centAmount)
    {
        $this->centAmount = $centAmount;
    }

    public static function fromCents(int $centAmount): self
    {
        return new self($centAmount);
    }

    public static function fromEuros(float $euros): self
    {
        return new self((int) bcmul((string) $euros, '100', 0));
    }

    public function getCentAmount(): int
    {
        return $this->centAmount;
    }

    public function getAmount(): int
    {
        return $this->centAmount;
    }

    public function __toString(): string
    {
        return (string) $this->centAmount;
    }
}
