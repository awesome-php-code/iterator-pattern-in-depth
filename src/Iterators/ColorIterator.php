<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Iterators;

use AwesomePhpCode\IteratorPatternInDepth\Vegetable;
use AwesomePhpCode\IteratorPatternInDepth\VegetableCollection;

class ColorIterator extends AbstractIterator
{
    private string $color;

    public function __construct(VegetableCollection $vegetableCollection, string $color)
    {
        $this->color = $color;
        parent::__construct($vegetableCollection);
    }

    protected function criteria(): void
    {
        $this->vegetables = array_filter(
            $this->vegetableCollection->getVegetables(),
            fn (Vegetable $vegetable) => $vegetable->getColor() === $this->color
        );
    }
}
