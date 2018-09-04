<?php

declare(strict_types = 1);

namespace PriceCalculator\Model;

final class ProductCollection extends GenericCollection
{
    public function __construct(Product ...$products)
    {
        $this->elements = $products;
    }

    public function addProduct(Product $product)
    {
        $this->elements[] = $product;

        return $this;
    }
}
