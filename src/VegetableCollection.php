<?php

namespace AwesomePhpCode\IteratorPatternInDepth;

class VegetableCollection
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
}
