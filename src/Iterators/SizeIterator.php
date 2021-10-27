<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Iterators;

use AwesomePhpCode\IteratorPatternInDepth\Helpers\ArrayHelper;

class SizeIterator extends AbstractIterator
{
    protected function criteria(): void
    {
        $vegetables = $this->vegetableCollection->getVegetables();
        $this->vegetables = ArrayHelper::bubbleSort($vegetables);
    }
}
