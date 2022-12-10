<?php

readonly class File
{
    public function __construct(
        public string $name,
        public int $size
    )
    {
    }
}