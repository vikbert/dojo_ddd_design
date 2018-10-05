<?php

declare(strict_types = 1);

namespace Domain\Traits;

/**
 * @author Xun Zhou <xun.zhou@lidl.com>
 */
trait IndexTrait
{
    /**
     * @return string[]
     */
    public function generateIndexes(int $start, int $end): array
    {
        $length = strlen((string) $end);
        if (1 === $length) {
            $length = 2;
        }

        return array_map(
            function (int $num) use ($length) {
                return sprintf('%0' . $length . 'd', $num);
            },
            range($start, $end)
        );
    }
}
