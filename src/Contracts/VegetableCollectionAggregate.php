<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Contracts;

interface VegetableCollectionAggregate
{
    public function getIteratorByColor(): VegetableIterator;
    public function getIteratorBySize(): VegetableIterator;
}
