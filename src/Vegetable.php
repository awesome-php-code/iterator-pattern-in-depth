<?php

namespace AwesomePhpCode\IteratorPatternInDepth;

class Vegetable
{
    private string $color;

    /**
     * Size in cm
     *
     * @var int
     */
    private int $size;

    /**
     * Expiration in days
     *
     * @var int
     */
    private int $expiration;

    public function __construct(string $color, int $size, int $expiration)
    {
        $this->color = $color;
        $this->size = $size;
        $this->expiration = $expiration;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getExpiration(): int
    {
        return $this->expiration;
    }
}