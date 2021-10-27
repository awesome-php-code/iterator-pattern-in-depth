<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Contracts;

use AwesomePhpCode\IteratorPatternInDepth\Vegetable;

interface VegetableIterator extends \Iterator
{
    public function current(): Vegetable;
}
