<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Iterators;

use AwesomePhpCode\IteratorPatternInDepth\Contracts\VegetableIterator;
use AwesomePhpCode\IteratorPatternInDepth\Vegetable;
use AwesomePhpCode\IteratorPatternInDepth\VegetableCollection;

abstract class AbstractIterator implements VegetableIterator
{
    protected VegetableCollection $vegetableCollection;

    protected array $vegetables;

    private int $key = 0;

    public function __construct(VegetableCollection $vegetableCollection)
    {
        $this->vegetableCollection = $vegetableCollection;
        $this->criteria();
        $this->vegetables = array_values($this->vegetables);
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

    abstract protected function criteria(): void;
}
