<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Iterators;

use AwesomePhpCode\IteratorPatternInDepth\Contracts\VegetableIterator;
use AwesomePhpCode\IteratorPatternInDepth\Vegetable;
use AwesomePhpCode\IteratorPatternInDepth\VegetableCollection;

class ColorIterator implements VegetableIterator
{
    private VegetableCollection $vegetableCollection;

    private array $vegetables;

    private int $key = 0;

    public function __construct(VegetableCollection $vegetableCollection, string $color)
    {
        $this->vegetableCollection = $vegetableCollection;
        $vegetables = $this->vegetableCollection->getVegetables();
        $this->filterByColor($vegetables, $color);
        $this->vegetables = array_values($vegetables);
    }

    public function next(): void
    {
        ++$this->key;
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return isset($this->vegetables[$this->key]);
    }

    public function rewind(): void
    {
        $this->key = 0;
    }

    public function current(): Vegetable
    {
        return $this->vegetables[$this->key];
    }

    private function filterByColor(array &$vegetables, string $color)
    {
        $vegetables = array_filter(
            $vegetables,
            fn (Vegetable $vegetable) => $vegetable->getColor() === $color
        );
    }
}
