<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Domain\Value\TaxRate;

final class Product
{
    private $name;
    private $price;
    private $tax;

    public function __construct(string $name, float $price, TaxRate $tax)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->tax = $tax;
    }

    public function getNetPrice(): float
    {
        return $this->price;
    }

    public function getGrossPrice(): float
    {
        return (1 + $this->tax->getValue() / 100) * $this->price;
    }

    public function setName(string $name): void
    {
        if (empty(trim($name))) {
            throw new \InvalidArgumentException('Name should not be empty.');
        }

        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        if (0.0 === $price) {
            throw new \InvalidArgumentException('Price should not be zero.');
        }

        $this->price = $price;
    }
}
