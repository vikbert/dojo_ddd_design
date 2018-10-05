<?php

declare(strict_types = 1);

namespace Domain\Value;

final class RecipeSku
{
    private $sku;
    private $year;
    private $calenderWeek;
    private $category;
    private $number;

    private function __construct(string $year, string $calenderWeek, string $category, string $number)
    {
        $this->year = $year;
        $this->calenderWeek = $calenderWeek;
        $this->category = $category;
        $this->number = $number;
    }

    public static function fromSku(string $sku): self
    {
        preg_match(
            "/^(?P<year>\d{4})(?P<calenderWeek>\d{2})(?P<category>[A-Z]{2})(?P<number>\d{2})$/",
            $sku,
            $matches
        );

        return new self($matches['year'], $matches['calenderWeek'], $matches['category'], $matches['number']);
    }

    public static function fromFormData(array $formData): self
    {
        return new self(
            $formData['year'],
            $formData['calenderWeek'],
            $formData['category'],
            $formData['number']
        );
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getCalenderWeek(): string
    {
        return $this->calenderWeek;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function __toString()
    {
        return sprintf('%s%s%s%s', $this->year, $this->calenderWeek, $this->category, $this->number);
    }
}
