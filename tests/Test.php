<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Tests;

use AwesomePhpCode\IteratorPatternInDepth\VegetableCollection;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @test
     */
    public function itWorks()
    {
        $this->assertSame('foo', VegetableCollection::foo());
    }
}
