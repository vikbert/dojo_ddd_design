<?php

declare(strict_types = 1);

namespace Domain\Entity\Collection;

use ArrayIterator;
use IteratorAggregate;

abstract class GenericCollection implements IteratorAggregate
{
    protected $elements = [];

    public function toArray(): array
    {
        return $this->elements;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->elements);
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }
}
