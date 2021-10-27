<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Helpers;

use AwesomePhpCode\IteratorPatternInDepth\Vegetable;

class ArrayHelper
{
    /**
     * @param Vegetable[] $vegetables
     * @return Vegetable[]
     */
    public static function bubbleSort(array $vegetables): array
    {
        $size = count($vegetables);

        for ($i=0; $i<$size -1; $i++) {
            for ($j=0; $j<$size - 1 - $i; $j++) {
                $vegetable = $vegetables[$j];
                $nextVegetable = $vegetables[$j+1];

                if ($nextVegetable->getSize() < $vegetable->getSize()) {
                    $vegetables[$j+1] = $vegetable;
                    $vegetables[$j] = $nextVegetable;
                }
            }
        }

        return $vegetables;
    }
}
