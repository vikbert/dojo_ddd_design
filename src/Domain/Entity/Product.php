<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Domain\Service\PriceConverter;
use Domain\Value\Price;
use Domain\Value\TaxRate;

final class Product
{
    private $name;
    private $price;
    private $tax;

    public function __construct(string $name, Price $price, TaxRate $tax)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->tax = $tax;
    }

    public function getNetPrice(): Price
    {
        return $this->price;
    }

    public function getGrossPrice(): Price
    {
        return (new PriceConverter())->convertToGrossPrice($this->price, $this->tax);
    }

    public function setName(string $name): void
    {
        if (empty(trim($name))) {
            throw new \InvalidArgumentException('Name should not be empty.');
        }

        $this->name = $name;
    }

    public function setPrice(Price $price): void
    {
        if (0 === $price->toCents()) {
            throw new \InvalidArgumentException('Price should not be zero.');
        }

        $this->price = $price;
    }
}
