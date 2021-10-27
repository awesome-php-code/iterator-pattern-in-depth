<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Tests;

use AwesomePhpCode\IteratorPatternInDepth\Vegetable;
use AwesomePhpCode\IteratorPatternInDepth\VegetableCollection;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @test
     */
    public function itIteratesVegetablesByColor()
    {
        $onion = new Vegetable('white', 10, 10);
        $carrot = new Vegetable('orange', 25, 5);
        $beetroot = new Vegetable('purple', 15, 2);
        $eggplant = new Vegetable('purple', 20, 3);
        $spinach = new Vegetable('green', 30, 4);

        $collection = new VegetableCollection();
        $collection->addVegetableStack([$onion, $carrot, $beetroot, $eggplant, $spinach]);

        $iterator = $collection->getIteratorByColor();

        $results = [];

        while ($iterator->valid()) {
            $results[] = $iterator->current();
            $iterator->next();
        }

        $this->assertCount(2, $results);
        $this->assertSame($beetroot, $results[0]);
        $this->assertSame($eggplant, $results[1]);
    }

    /**
     * @test
     */
    public function itIteratesVegetablesBySize()
    {
        $onion = new Vegetable('white', 10, 10);
        $carrot = new Vegetable('orange', 25, 5);
        $beetroot = new Vegetable('purple', 15, 2);
        $eggplant = new Vegetable('purple', 20, 3);
        $spinach = new Vegetable('green', 30, 4);

        $collection = new VegetableCollection();
        $collection->addVegetableStack([$onion, $carrot, $beetroot, $eggplant, $spinach]);

        $iterator = $collection->getIteratorBySize();

        $results = [];

        while ($iterator->valid()) {
            $results[] = $iterator->current();
            $iterator->next();
        }

        $this->assertCount(5, $results);
        $this->assertSame($onion, $results[0]);
        $this->assertSame($beetroot, $results[1]);
        $this->assertSame($eggplant, $results[2]);
        $this->assertSame($carrot, $results[3]);
        $this->assertSame($spinach, $results[4]);
    }
}
