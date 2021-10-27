<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Contracts;

interface VegetableCollectionAggregate extends \IteratorAggregate
{
    public function getIterator(): VegetableIterator;
}
