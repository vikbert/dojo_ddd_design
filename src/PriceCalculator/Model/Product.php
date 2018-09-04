<?php

declare(strict_types = 1);

namespace PriceCalculator\Model;

final class Product
{
    private $name;
    private $price;
    private $tax;

    public function __construct(string $name, float $price, int $tax)
    {
        $this->name = $name;
        $this->price = $price;
        $this->tax = $tax;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getTax(): int
    {
        return $this->tax;
    }

    public function getNetPrice(): float
    {
        return $this->price;
    }

    public function getGrossPrice(): float
    {
        return (1 + $this->tax / 100) * $this->price;
    }
}
