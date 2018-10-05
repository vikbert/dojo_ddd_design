<?php

declare(strict_types = 1);

use Domain\Traits\IndexTrait;
use PHPUnit\Framework\TestCase;

class IndexTraitTest extends TestCase
{
    public function testGenerateIndexes(): void
    {
        $trait = $this->getMockForTrait(IndexTrait::class);

        $this->assertSame(['01'], $trait->generateIndexes(1, 1));

        $haystack = $trait->generateIndexes(1, 99);
        $this->assertCount(99, $haystack);
        $this->assertTrue(in_array('01', $haystack, true));
        $this->assertTrue(in_array('99', $haystack, true));

        $haystack = $trait->generateIndexes(1, 999);
        $this->assertCount(999, $haystack);
        $this->assertTrue(in_array('001', $haystack, true));
        $this->assertTrue(in_array('999', $haystack, true));
    }
}
