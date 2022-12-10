<?php

class Stack
{
    /**
     * @var array<int, string>
     */
    private array $stack = [];

    public function getCrates(int $numberOfCrates): array
    {
        return array_reverse(array_splice($this->stack, -$numberOfCrates));
    }

    public function addCrates(array $crates): self
    {
        foreach ($crates as $crate) {
            $this->stack[] = $crate;
        }

        return $this;
    }

    public function getTopCrate(): string
    {
        if (empty($this->stack))
        {
            throw new InvalidArgumentException('Not crates in stack');
        }

        return array_slice($this->stack, -1)[0];
    }
}