<?php

namespace AwesomePhpCode\IteratorPatternInDepth;

use AwesomePhpCode\IteratorPatternInDepth\Contracts\VegetableCollectionAggregate;
use AwesomePhpCode\IteratorPatternInDepth\Contracts\VegetableIterator;
use AwesomePhpCode\IteratorPatternInDepth\Iterators\ColorIterator;

class VegetableCollection implements VegetableCollectionAggregate
{
    /**
     * @var Vegetable[]
     */
    private array $vegetables;

    public function getVegetables(): array
    {
        return $this->vegetables;
    }

    public function addVegetable(Vegetable $vegetable): void
    {
        $this->vegetables[] = $vegetable;
    }

    public function addVegetableStack(array $vegetables)
    {
        array_map('self::addVegetable', $vegetables);
    }

    public function getIterator(): VegetableIterator
    {
        return new ColorIterator($this, 'purple');
    }
}
