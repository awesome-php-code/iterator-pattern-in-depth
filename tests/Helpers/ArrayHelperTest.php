<?php

namespace AwesomePhpCode\IteratorPatternInDepth\Tests\Helpers;

use AwesomePhpCode\IteratorPatternInDepth\Helpers\ArrayHelper;
use AwesomePhpCode\IteratorPatternInDepth\Vegetable;
use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{
    /**
     * @test
     */
    public function itOrdersBySizeInFirstIteration()
    {
        $onion = new Vegetable('white', 10, 10);
        $carrot = new Vegetable('orange', 25, 5);
        $beetroot = new Vegetable('purple', 15, 2);
        $eggplant = new Vegetable('purple', 20, 3);
        $spinach = new Vegetable('green', 30, 4);

        $ordered = ArrayHelper::bubbleSort([$onion, $carrot, $beetroot, $eggplant, $spinach]);

        $this->assertSame(
            [$onion, $beetroot, $eggplant, $carrot, $spinach],
            $ordered
        );
    }

    /**
     * @test
     */
    public function itOrdersBySizeInSubsequentIterations()
    {
        $spinach = new Vegetable('green', 30, 4);
        $carrot = new Vegetable('orange', 25, 5);
        $eggplant = new Vegetable('purple', 20, 3);
        $beetroot = new Vegetable('purple', 15, 2);
        $onion = new Vegetable('white', 10, 10);

        $ordered = ArrayHelper::bubbleSort([$onion, $carrot, $beetroot, $eggplant, $spinach]);

        $this->assertSame(
            [$onion, $beetroot, $eggplant, $carrot, $spinach],
            $ordered
        );
    }
}
