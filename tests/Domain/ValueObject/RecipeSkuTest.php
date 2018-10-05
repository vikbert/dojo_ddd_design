<?php

declare(strict_types = 1);

use Domain\Value\RecipeSku;
use PHPUnit\Framework\TestCase;

class RecipeSkuTest extends TestCase
{
    public function testFromSku(): void
    {
        $recipeSku = RecipeSku::fromSku('201841WR01');

        $this->assertSame('201841WR01', (string) $recipeSku);
        $this->assertSame('2018', $recipeSku->getYear());
        $this->assertSame('41', $recipeSku->getCalenderWeek());
        $this->assertSame('WR', $recipeSku->getCategory());
        $this->assertSame('01', $recipeSku->getNumber());
    }

    public function testFromFormData(): void
    {
        $recipeSku = RecipeSku::fromFormData(
            [
                'year' => '2018',
                'calenderWeek' => '41',
                'category' => 'WR',
                'number' => '01',
            ]
        );

        $this->assertSame('201841WR01', (string) $recipeSku);
        $this->assertSame('2018', $recipeSku->getYear());
        $this->assertSame('41', $recipeSku->getCalenderWeek());
        $this->assertSame('WR', $recipeSku->getCategory());
        $this->assertSame('01', $recipeSku->getNumber());
    }
}
